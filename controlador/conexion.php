<?php
// PDO conexion data base
function connect() {
	$hostname = 'localhost';
	$name = 'u917997591_classic_street';
	$user = 'u917997591_andres';
	$password = 'CSBS2022db';
	return new PDO('mysql:host='.$hostname.';dbname='.$name, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}
?>