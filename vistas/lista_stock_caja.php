
<div class="main-card mb-3 card">
    <div class="card-body">
        <table class="mb-0 table">
            <thead>
                <tr>

                    <th>Codigo Producto</th>
                    <th>Producto</th>
                    <th>Descripción</th>
                    <th>Cantidad</th>

                    <?php
                    $sql = "SELECT * FROM stock ;";
                    $query = $pdo->prepare($sql);
                    $query->execute();
                    $list = $query->fetchAll();


                    foreach ($list as $rs) {


                        ?>
                        <tr>

                            <td><?php echo $rs['codigo']; ?></td>
                            <td><?php echo $rs['producto']; ?></td>
                            <td><?php echo $rs['descripcion']; ?></td>
                            <td><?php echo $rs['cantidad']; ?></td>

                        </tr>
                        <?php

                    }
                    ?>
                </tr>

            </table>
        </div>
    </div>
</div>






