<?php

include('../conexion.php');
$pdo = connect();

session_start(); 

try {
	

$host = "localhost";
$nombre = "u917997591_classic_street";
$usuario = "u917997591_andres";
$password = "CSBS2022db";
$fecha = date('Y-m-d'); 
$nombre_sql = $nombre .'_'.$fecha.'.sql';
$dump = "mysqldump -h$host -u$usuario -p$password $nombre > $nombre_sql";
exec ($dump);
$zip = new ZipArchive();
$nombre_zip = ''.'_'.$fecha.'.zip';
if($zip->open($nombre_zip, ZipArchive::CREATE) === true){
    $zip->addFile($nombre_sql);
    $zip->close();
    unlink($nombre_sql); 
}

	$sql2 = "truncate table ventas;";
	$query2 = $pdo->prepare($sql2);
	$query2->execute();

		
} catch (PDOException $e) {
	echo 'PDOException : '.  $e->getMessage();
}

header("location:../../ventas.php");
?>