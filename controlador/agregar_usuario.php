<?php

include('conexion.php');
$pdo = connect();
try {
	$sql = "CALL sp_agregarUsuario(:usuario, :correo, :password, :puesto); ";
	$query = $pdo->prepare($sql);
	$encriptado = hash("sha256",$_POST['password']);
	$query->bindParam(':usuario', $_POST['usuario'], PDO::PARAM_STR);
	$query->bindParam(':correo', $_POST['correo'], PDO::PARAM_STR);
	$query->bindParam(':password', $encriptado , PDO::PARAM_STR);
	$query->bindParam(':puesto', $_POST['puesto'], PDO::PARAM_STR);
	$query->execute();
} catch (PDOException $e) {
	echo 'PDOException : '.  $e->getMessage();
}

include('../vistas/lista_usuarios.php');
?>