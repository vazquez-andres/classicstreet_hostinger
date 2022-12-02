
	<select name="cargo" id="cargo" class="form-control">
		<option>Selecciona un Cargo</option>                        
		
<?php

include('controlador/conexion.php');
$pdo = connect();
try {
    $sql = "call sp_listarCargo;";
    $query = $pdo->prepare($sql);
    $query->execute();
    $list = $query->fetchAll();
    foreach ($list as $rs) {
        ?>
        <tr>
            <td><?php echo '<option value="'.$rs['cargo'].'">'.$rs['cargo'].'</option>'; ?></td>
            
        </tr>
        <?php
    }
    
} catch (PDOException $e) {
	echo 'PDOException : '.  $e->getMessage();
}
?>

		echo $var;
		?>   </select>



