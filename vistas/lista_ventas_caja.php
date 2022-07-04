
<div class="main-card mb-3 card">
    <div class="card-body">
        <table class="mb-0 table">
            <thead>
                <tr>
                    <th>Nombre de Producto</th>

                    <th>Cantidad</th>
                    <th>Fecha</th>

                    <?php
                    $sql = "CALL sp_listarVentasCaja('".$nombre."');";
                    $query = $pdo->prepare($sql);
                    $query->execute();
                    $list = $query->fetchAll();


                    foreach ($list as $rs) {

                        ?>
                        <tr>
                            <td><?php echo $rs['producto']; ?></td>
                            <td><?php echo $rs['cantidad']; ?></td>
                            <td><?php echo $rs['fecha']; ?></td>



                        </tr>
                        <?php

                    }
                    ?>
                </tr>

            </table>
        </div>
    </div>
</div>






<!--<td><a href="#" onclick="delete_member(<?php //echo $rs['id']; ?>)"> Borrar</a></td>