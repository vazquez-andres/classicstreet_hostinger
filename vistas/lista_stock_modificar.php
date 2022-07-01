
<div class="main-card mb-3 card">
    <div class="card-body"><h5 class="card-title">Stock</h5>
        <table class="mb-0 table">
            <thead>
                <tr>

                    <th>Codigo Producto</th>
                    <th>Producto</th>
                    <th>Descripción</th>
                    <th>Cantidad</th>
                    <th>Borrar</th>
                    <th>Editar</th>
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
                            <td><?php echo $rs['descripcion']; ?></a></td>
                            <td><?php echo $rs['cantidad']; ?></td>
                            <td><a href="#" onclick="borrar_stock(<?php echo $rs['codigo']; ?>)"> <i class="metismenu-icon pe-7s-trash"></a></td>
                            <td><button type="button" onclick="modal_stock('<?php echo $rs['codigo']; ?>','<?php echo $rs['producto']; ?>','<?php echo $rs['descripcion']; ?>','<?php echo $rs['cantidad']; ?>')" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Editar</button></td>
                                
                            </tr>
                            <?php

                       
                        }
                        ?>
                    </tr>

                </table>
            


            </div>
        </div>
    </div>


    



