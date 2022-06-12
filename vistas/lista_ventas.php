
<div class="main-card mb-3 card">
    <div class="card-body"><h5 class="card-title">Ventas</h5>
        <table class="mb-0 table">
            <thead>
                <tr>
                    <th>Nombre de Producto</th>
                    <th>Vendedor</th>
                    <th>Precio</th>
                    <th>Fecha</th>
                    <th>Borrar</th>
                    <?php
                    $sql = "SELECT * FROM ventas ;";
                    $query = $pdo->prepare($sql);
                    $query->execute();
                    $list = $query->fetchAll();


                    foreach ($list as $rs) {


                        ?>
                        <tr>
                            <td><?php echo $rs['producto']; ?></td>
                            <td><?php echo $rs['nombre_vendedor']; ?></td>
                            <td>$<?php echo $rs['precio']; ?></td>
                            <td><?php echo $rs['fecha']; ?></td>
                           <td><a href="#" onclick="borrar_venta(<?php echo $rs['id_venta']; ?>)"> <i class="metismenu-icon pe-7s-trash"></i></a></td>




                        </tr>
                        <?php

                    }
                    ?>
                </tr>

            </table>
        </div>
    </div>
</div>
