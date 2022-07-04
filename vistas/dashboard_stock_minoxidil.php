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

}
} catch (PDOException $e) {
	echo 'PDOException : '.  $e->getMessage();
}
?>