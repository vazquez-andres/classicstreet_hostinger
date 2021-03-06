<?php

include('conexion.php');
$pdo = connect();
// Borrar alumno con PDO
try {
	$sql = "call sp_borrarUsuario(:id);";
	$query = $pdo->prepare($sql);
	$query->bindParam(':id', $_POST['id'], PDO::PARAM_INT);
	$query->execute();
} catch (PDOException $e) {
	echo 'PDOException : '.  $e->getMessage();
}

// Mostrar lista de alumnos
include('../vistas/lista_usuarios.php');
?>