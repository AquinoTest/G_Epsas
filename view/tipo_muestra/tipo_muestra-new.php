<h1 class="page-header">Nuevo Tipo Muestra</h1>

<ol class="breadcrumb" style="background-color: white;">
    <li><a href="?c=tipo_cliente" style="color:#0016b0;">Tipo de Muestra</a></li>
    <li class="active">Nuevo Tipo Muestra</li>
</ol>

<form action="?c=tipo_muestra&a=guardar" method="post" autocomplete="off">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="nombre" class="form-control" placeholder="Ingrese el nombre de tipo de muestra" required />
            </div>
        </div>
    </div>
    <br>
    <div class="text-center">
        <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-floppy-o"></i> Guardar</button>
    </div>
</form>
