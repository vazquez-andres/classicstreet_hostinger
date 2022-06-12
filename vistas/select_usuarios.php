
	<select name="nombre" id="nombre" class="form-control">
		<option>Selecciona un Usuario</option>                        
		
<?php

include('controlador/conexion.php');
$pdo = connect();
try {
    $sql = "SELECT * FROM usuarios";
    $query = $pdo->prepare($sql);
    $query->execute();
    $list = $query->fetchAll();
    foreach ($list as $rs) {
        ?>
        <tr>
            <td><?php echo '<option value="'.$rs['nombre'].'">'.$rs['nombre'].'</option>'; ?></td>
            
        </tr>
        <?php
    }
    
} catch (PDOException $e) {
	echo 'PDOException : '.  $e->getMessage();
}
?>

		echo $var;
		?>   </select>



