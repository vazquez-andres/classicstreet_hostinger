<?php
$host_name = "localhost";
$database = "u119512436_classic_street"; 
$username = "u119512436_andres";         
$password = "Andresflash100";     

try {
$dbo = new PDO('mysql:host='.$host_name.';dbname='.$database, $username, $password);
} catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
}
?>