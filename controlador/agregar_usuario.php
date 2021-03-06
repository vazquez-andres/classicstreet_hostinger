<?php

include('conexion.php');
$pdo = connect();
// agregar alumnos
try {
	$sql = "CALL sp_agregarUsuario(:usuario, :correo, :password, :puesto); ";
	$query = $pdo->prepare($sql);
	
	$query->bindParam(':usuario', $_POST['usuario'], PDO::PARAM_STR);
	$query->bindParam(':correo', $_POST['correo'], PDO::PARAM_STR);
	$query->bindParam(':password', $_POST['password'], PDO::PARAM_STR);
	$query->bindParam(':puesto', $_POST['puesto'], PDO::PARAM_STR);
	$query->execute();
} catch (PDOException $e) {
	echo 'PDOException : '.  $e->getMessage();
}

// Lista de alumnos a ver
include('../vistas/lista_usuarios.php');
?>