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
    // El mensaje
    $mensaje = "Línea 1\r\nLínea 2\r\nLínea 3";

    // Si cualquier línea es más larga de 70 caracteres, se debería usar wordwrap()
    $mensaje = wordwrap($mensaje, 70, "\r\n");

    // Enviarlo
    mail('andres_vazquezocampo@outlook.es', 'Mi título', $mensaje);
}
} catch (PDOException $e) {
	echo 'PDOException : '.  $e->getMessage();
}
?>