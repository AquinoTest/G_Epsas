<body >
<h1 class="page-header">Cargo</h1>

    <a class="btn btn-primary" href="?c=cargo&a=nuevo"><i class="fa fa-plus"></i> Nuevo Cargo</a>
    <table class="table table-striped results ">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th style="width:90px; text-align: center;" colspan="2"> Acciones</th>
            </tr>
        </thead>
        <tbody>
       
            <?php foreach ($lista as $r): ?>
                <tr>
                    <td><?php echo $r->nombre; ?></td>
                    <td><?php echo $r->descripcion; ?></td>
                    <td>
                        <a href="?c=cargo&a=editar&pkcargo=<?php echo $r->pkcargo; ?>" style="color:black;"><i class="fa fa-pencil"></i>Editar</a>
                    </td>
                    <td>
                        <a onclick="javascript:return confirm('Seguro de eliminar este registro?');" 
                               href="?c=cargo&a=eliminar&pkcargo=<?php echo $r->pkcargo; ?>" style="color:black;"><i class="fa fa-trash"></i>Eliminar</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>