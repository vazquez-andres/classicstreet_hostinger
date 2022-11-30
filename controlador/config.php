<?php
$host_name = "localhost";
$database = "u917997591_classic_street"; 
$username = "u917997591_andres";         
$password = "CSBS2022db";     

try {
$dbo = new PDO('mysql:host='.$host_name.';dbname='.$database, $username, $password);
} catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
}
?>