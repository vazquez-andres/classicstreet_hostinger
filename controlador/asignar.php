<?php

$pdo = connect();
try {
    $cargo= $_POST['cargo'];
	$sql = "CALL sp_asingarRol(:usuario, :cargo); ";
	$query = $pdo->prepare($sql);
	$query->bindParam(':usuario', $_POST['usuario'], PDO::PARAM_STR);
    if($cargo=='Administrador'){
        $cargo=1;
        echo $cargo;
    }
    else{
        $cargo=2;
        echo $cargo;
    }
	$query->bindParam(':cargo', $cargo, PDO::PARAM_STR);
	$query->execute();
} catch (PDOException $e) {
	echo 'PDOException : '.  $e->getMessage();
}

?>