<?php

include('conexion.php');
$pdo = connect();
try {
	$sql = "INSERT INTO stock (producto, descripcion,cantidad) VALUES (:producto, :descripcion,:cantidad)";
	$query = $pdo->prepare($sql);
	
	$query->bindParam(':producto', $_POST['producto'], PDO::PARAM_STR);
	$query->bindParam(':descripcion', $_POST['descripcion'], PDO::PARAM_STR);
	$query->bindParam(':cantidad', $_POST['cantidad'], PDO::PARAM_STR);
	$query->execute();
} catch (PDOException $e) {
	echo 'PDOException : '.  $e->getMessage();
}

include('../vistas/lista_stock.php');
?>