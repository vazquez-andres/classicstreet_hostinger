<?php

include('conexion.php');
$pdo = connect();
try {
	$sql = "UPDATE stock SET cantidad =:cantidad, producto=:producto,descripcion=:descripcion WHERE codigo = :id";
	$query = $pdo->prepare($sql);
	$query->bindParam(':cantidad', $_POST['cantidad'], PDO::PARAM_STR);
	$query->bindParam(':producto', $_POST['producto'], PDO::PARAM_STR);	
	$query->bindParam(':descripcion', $_POST['descripcion'], PDO::PARAM_STR);
	$query->bindParam(':id', $_POST['id'], PDO::PARAM_STR);
	$query->execute();
} catch (PDOException $e) {
	echo 'PDOException : '.  $e->getMessage();
}

include('../vistas/lista_stock_modificar.php');
?>