
	<select name="producto" id="producto" class="form-control">
		<option>Selecciona un producto</option>                        
		
<?php
include('controlador/conexion.php');
$pdo = connect();
try {
    $sql = "SELECT * FROM stock";
    $query = $pdo->prepare($sql);
    $query->execute();
    $list = $query->fetchAll();
    foreach ($list as $rs) {
        ?>
        <tr>
            <td><?php echo '<option value="'.$rs['producto'].'">'.$rs['producto'].'</option>'; ?></td>
            
        </tr>
        <?php
    }
    
} catch (PDOException $e) {
	echo 'PDOException : '.  $e->getMessage();
}
?>

		echo $var;
		?>   </select>



