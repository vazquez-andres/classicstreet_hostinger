<?php

include('conexion.php');
$pdo = connect();
// agregar alumnos
try {
	$sql="UPDATE usuarios SET password = :password WHERE nombre=:usuario and usuario=:correo";
	$query = $pdo->prepare($sql);
	$encriptado = hash("sha256",$_POST['password']);
	$query->bindParam(':password', $encriptado, PDO::PARAM_STR);
	$query->bindParam(':usuario', $_POST['usuario'], PDO::PARAM_STR);
	$query->bindParam(':correo', $_POST['correo'], PDO::PARAM_STR);
	
	$query->execute();
} catch (PDOException $e) {
	echo 'PDOException : '.  $e->getMessage();
}

// Lista de alumnos a ver
include('../vistas/lista_usuarios.php');
?>