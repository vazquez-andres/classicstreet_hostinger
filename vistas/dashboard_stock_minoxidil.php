<?php
try {
    $sql = "SELECT cantidad FROM stock WHERE producto='minoxidil';";
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

} catch (PDOException $e) {
	echo 'PDOException : '.  $e->getMessage();
}
?>