<?php

include('conexion.php');
$pdo = connect();

session_start(); 

$nombre = $_SESSION['nombre'];
// agregar alumnos
try {
	
	date_default_timezone_set('America/Mexico_City');  
	$fecha = date('m-d-Y h:i:s a', time());  

	

	if ($_POST['producto']=="corte"||$_POST['producto']=="Delineado de Ceja"||$_POST['producto']=="Delineado de Barba") {
		
    $sql = "INSERT INTO ventas (producto, precio, nombre_vendedor, cantidad,fecha) VALUES (:producto,:precio, :nombre,:cantidad,:fecha)";
	$query = $pdo->prepare($sql);
	
	$query->bindParam(':precio', $_POST['precio'], PDO::PARAM_STR);
	$query->bindParam(':nombre', $nombre, PDO::PARAM_STR);
	$query->bindParam(':cantidad', $_POST['cantidad'], PDO::PARAM_STR);
	$query->bindParam(':producto', $_POST['producto'], PDO::PARAM_STR);
	$query->bindParam(':fecha', $fecha, PDO::PARAM_STR);
	
	$query->execute();
	}


	else
	{

	$sql2 = "UPDATE stock SET  cantidad= IF(cantidad>=1,cantidad-:cantidad,'SIN STOCK') WHERE producto=:producto";
	$query2 = $pdo->prepare($sql2);
	$query2->bindParam(':producto', $_POST['producto'], PDO::PARAM_STR);
	$query2->bindParam(':cantidad', $_POST['cantidad'], PDO::PARAM_STR);
	$query2->execute();


	$revisar = "select cantidad from stock WHERE cantidad='SIN STOCK' and producto='".$_POST['producto']."'";
	$stock = $pdo->prepare($revisar);
	$stock->execute();

	$cuenta = $stock->rowCount();
    if ($cuenta>0) {
      echo "SIN STOCK DISPONIBLE";
    }
    else {
    	$sql = "INSERT INTO ventas (producto, precio, nombre_vendedor, cantidad,fecha) VALUES (:producto,:precio, :nombre,:cantidad,:fecha)";
	$query = $pdo->prepare($sql);
	
	$query->bindParam(':precio', $_POST['precio'], PDO::PARAM_STR);
	$query->bindParam(':nombre', $nombre, PDO::PARAM_STR);
	$query->bindParam(':cantidad', $_POST['cantidad'], PDO::PARAM_STR);
	$query->bindParam(':producto', $_POST['producto'], PDO::PARAM_STR);
	$query->bindParam(':fecha', $fecha, PDO::PARAM_STR);
	
	$query->execute();
    }
	}

	



	
	
} catch (PDOException $e) {
	//echo 'PDOException : '.  $e->getMessage();
}

// Lista de alumnos a ver
include('../vistas/lista_ventas.php');
include('../vistas/lista_stock.php');
?>