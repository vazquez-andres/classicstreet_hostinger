<?php
try {
    $sql = "call sp_vistaAfter";
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
        alert("El stock de after shave esta por terminarse");
        
        </script>';
        date_default_timezone_set('America/Mexico_City');
        $diassemana = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        $dias = array("01","02","03","04","05","06","07","08","09","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31");
        $fecha_completa= $diassemana[date('w')]." ".$dias[date('d')-1]." de ".$meses[date('n')-1]. " del ".date('Y');

        $mensaje = "Le informamos que su stock de after shave esta a punto de terminarse,\n le sugerimos contactar con el proveedor para evitar inconvenientes.\n".$fecha_completa;
        $mensaje = wordwrap($mensaje, 70, "\r\n");
        mail('andres_vazquezocampo@outlook.es', '¡AVISO EL STOCK DE AFTER SHAVE ESTA POR TERMINARSE!', $mensaje);
    
    
    }
} catch (PDOException $e) {
	echo 'PDOException : '.  $e->getMessage();
}
?>