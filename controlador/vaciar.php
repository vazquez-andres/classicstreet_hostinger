<?php

include('conexion.php');
$pdo = connect();

session_start(); 

try {
	

$host = "localhost";
$nombre = "u119512436_classic_street";
$usuario = "u119512436_andres";
$password = "Andresflash100";
$fecha = date('Ymd_His'); 
$nombre_sql = $nombre .'_'.$fecha.'.sql';
$dump = "mysqldump -h$host -u$usuario -p$password $nombre > $nombre_sql";
exec ($dump);
$zip = new ZipArchive();
$nombre_zip = $nombre.'_'.$fecha.'.zip';
if($zip->open($nombre_zip, ZipArchive::CREATE) === true){
    $zip->addFile($nombre_sql);
    $zip->close();
    unlink($nombre_sql);
    //header ("Location: $nombre_zip");
}

	//$sql2 = "truncate table ventas;";
	
	//$query2 = $pdo->prepare($sql2);
	
	//$query2->execute();

		
} catch (PDOException $e) {
	echo 'PDOException : '.  $e->getMessage();
}

// Lista de alumnos a ver
header("location:../ventas.php");
?>