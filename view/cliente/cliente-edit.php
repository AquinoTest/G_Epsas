<body >
<h1 class="page-header">Cliente</h1>

    <a class="btn btn-primary" href="?c=cliente&a=nuevo"><i class="fa fa-plus"></i> Nuevo Cliente</a>
    <table class="table table-striped results ">
        <thead>
            <tr>
                <th>CI</th>
                <th>Nombre</th>
                <th>Telefono</th>
                <th>Departamento</th>
                <th>Tipo Cliente</th>
                <th style="width:90px; text-align: center;" colspan="2"> Acciones</th>
            </tr>
        </thead>
        <tbody>
       
            <?php foreach ($lista as $r): ?>
                <tr>
                    <td><?php echo $r->ci; ?></td>
                    <td><?php echo $r->nombre; ?></td>
                    <td><?php echo $r->telefono; ?></td>
                    <td><?php echo $r->departamento; ?></td>
                    <td><?php echo $r->tipo_cliente; ?></td>
                    <td>
                        <a href="?c=cliente&a=editar&pkcliente=<?php echo $r->ci; ?>"><i class="fa fa-pencil"></i>Editar</a>
                    </td>
                    <td>
                        <a onclick="javascript:return confirm('Seguro de eliminar este registro?');" 
                               href="?c=cliente&a=eliminar&pkcliente=<?php echo $r->ci; ?>"><i class="fa fa-trash"></i>Eliminar</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>