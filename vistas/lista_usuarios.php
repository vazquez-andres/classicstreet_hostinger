
<div class="main-card mb-3 card">
    <div class="card-body"><h5 class="card-title">Usuarios</h5>
        <table class="mb-0 table">
            <thead>
                <tr>

                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Puesto</th>
                    <th>Borrar</th>
                    <?php
                    $sql = "SELECT * FROM usuarios ;";
                    $query = $pdo->prepare($sql);
                    $query->execute();
                    $list = $query->fetchAll();


                    foreach ($list as $rs) {

                     if($rs['id_cargo']==1){
                        $cargo='Administrador';
                    }
                    else{
                        $cargo='Ventas';

                    }
                    ?>
                    <tr>

                        <td><?php echo $rs['nombre']; ?></td>
                        <td><?php echo $rs['usuario']; ?></td>
                        <td><?php echo $cargo; ?></td>
                        <td><a href="#" onclick="borrar_usuario(<?php echo $rs['id']; ?>)"> <i class="metismenu-icon pe-7s-trash"></i></a></td>

                    </tr>
                    <?php

                }
                ?>
            </tr>

        </table>
    </div>
</div>
</div>






