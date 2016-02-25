<body >
<h1 class="page-header">Usuario</h1>

    <a class="btn btn-primary" href="?c=usuario&a=nuevo"><i class="fa fa-plus"></i> Nuevo Usuario</a>
    <table class="table table-striped results ">
        <thead>
            <tr>
                <th>CI</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Username</th>
                <th>Cargo</th>
                <th style="width:90px; text-align: center;" colspan="2"> Acciones</th>
            </tr>
        </thead>
        <tbody>
       
            <?php foreach ($lista as $r): ?>
                <tr>
                    <td><?php echo $r->ci; ?></td>
                    <td><?php echo $r->nombre; ?></td>
                    <td><?php echo $r->email; ?></td>
                    <td><?php echo $r->telefono; ?></td>
                    <td><?php echo $r->cargo; ?></td>
                    <td>
                        <a href="?c=usuario&a=editar&pkusuario=<?php echo $r->pkusuario; ?>" style="color:black;"><i class="fa fa-pencil"></i>Editar</a>
                    </td>
                    <td>
                        <a onclick="javascript:return confirm('Seguro de eliminar este registro?');" 
                               href="?c=usuario&a=eliminar&pkusuario=<?php echo $r->pkusuario; ?>" style="color:black;"><i class="fa fa-trash"></i>Eliminar</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>