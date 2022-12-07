<?php
try {
    $sql = "call sp_vistaPomada;";
    $query = $pdo->prepare($sql);
    $query->execute();
    $list = $query->fetchAll();
    foreach ($list as $rs) {
        ?>
        <tr>

            <td><?php echo $rs['cantidad']; ?></td>
        </tr>
        <?php
    }
    if($rs['cantidad']<3){
        echo'<script type="text/javascript">
        alert("El stock de pomada esta por terminarse");
        </script>';
        $mensaje = "Le informamos que su stock de pomada está a punto de terminarse,\r\n le sugerimos contactar con el proveedor para evitar inconvenientes.";
        $mensaje = wordwrap($mensaje, 70, "\r\n");
        mail('andres_vazquezocampo@outlook.es', '¡AVISO EL STOCK DE POMADA ESTÁ POR TERMINARSE!', $mensaje);
            
    
    }
} catch (PDOException $e) {
	echo 'PDOException : '.  $e->getMessage();
}
?>