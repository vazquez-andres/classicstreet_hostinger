<?php

include('../conexion.php');
$pdo = connect();

session_start(); 

try {
	

	$sql2 = "drop table usuarios; drop table ventas; drop table stock; drop table cargo;";
	$query2 = $pdo->prepare($sql2);
	$query2->execute();

		
} catch (PDOException $e) {
	echo 'PDOException : '.  $e->getMessage();
}
header("location:../../backup.php");
?>