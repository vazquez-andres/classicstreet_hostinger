<?php

include('conexion.php');
$pdo = connect();
try {
    $cargo= $_POST['cargo'];
	$sql = "CALL sp_asingarRol(:nombre, :cargo); ";
	$query = $pdo->prepare($sql);
	$query->bindParam(':nombre', $_POST['nombre'], PDO::PARAM_STR);
    if($cargo=='administrador'){
        $cargo=1;
    }
    else{
        $cargo=2;
    }
	$query->bindParam(':cargo', $cargo, PDO::PARAM_STR);
	$query->execute();
} catch (PDOException $e) {
	echo 'PDOException : '.  $e->getMessage();
}

?>