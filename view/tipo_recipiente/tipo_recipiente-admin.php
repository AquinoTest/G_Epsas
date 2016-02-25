<h1 class="page-header">Tipos de recipientes</h1>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default" style="overflow: scroll; height: 500px">
            <div class="panel-heading">
                <a class="btn btn-primary" href="?c=tipo_recipiente&a=nuevo"><i class="fa fa-plus"></i> Nuevo tipo de recipiente</a>
            </div>
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Estado</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($lista as $r): ?>
                            <tr>
                                <td><?php echo $r->nombre; ?></td>
                                <td><?php echo $r->descripcion; ?></td>
                                <td><?php echo $r->estado; ?></td>
                                <td>
                                    <a href="?c=tipo_recipiente&a=editar&pkcliente=<?php echo $r->pktipo_recipiente; ?>" style="color: #263340"><i class="fa fa-pencil"></i>Editar</a>
                                    <a href="?c=tipo_recipiente&a=eliminar&pkcliente=<?php echo $r->pktipo_recipiente; ?>" style="color: darkred"><i class="fa fa-trash"></i>Eliminar</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery para buscador y paginacion-->
<script src="resources/bower_components/jquery/dist/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script>