<?php
try {
    $sql = "call sp_vistaMinoxidil;";
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
    alert("El stock de minoxidil esta por terminarse");
    
    </script>';
    $mensaje = "Le informamos que su stock de minoxidil está a punto de terminarse,\r\n le sugerimos contactar con el proveedor para evitar inconvenientes.";
    $mensaje = wordwrap($mensaje, 70, "\r\n");
    mail('andres_vazquezocampo@outlook.es', '¡AVISO EL STOCK DE MINOXIDIL ESTÁ POR TERMINARSE!', $mensaje);
}
} catch (PDOException $e) {
	echo 'PDOException : '.  $e->getMessage();
}
?>