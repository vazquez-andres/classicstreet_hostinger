<?php
include('controlador/conexion.php');
$pdo = connect();
try {
    $sql = "call sp_calcularSueldo;";
    $query = $pdo->prepare($sql);
    $query->execute();
    $list = $query->fetchAll();
    foreach ($list as $rs) {
        ?>
        <tr>
            <td><?php echo "$".$rs['SUM(precio)']*0.40; ?></td>
            
        </tr>
        <?php
    }
    
} catch (PDOException $e) {
	echo 'PDOException : '.  $e->getMessage();
}
?>