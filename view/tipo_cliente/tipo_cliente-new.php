<h1 class="page-header">Nuevo Tipo Cliente</h1>

<ol class="breadcrumb" style="background-color: white;">
    <li><a href="?c=tipo_cliente" style="color:#0016b0;">Tipo Cliente</a></li>
    <li class="active">Nuevo Tipo Cliente</li>
</ol>

<form action="?c=tipo_cliente&a=guardar" method="post" autocomplete="off">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Sigla</label>
                <input type="text" name="sigla" class="form-control" placeholder="Ingrese la sigla para el tipo de usuario" required >
            </div>
            <div class="form-group">
                <label>Descripcion</label>
                <input type="text" name="descripcion" class="form-control" placeholder="Ingrese la descripcion" required />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="nombre" class="form-control" placeholder="Ingrese el nombre de tipo de usuario" required />
            </div>
            <div class="form-group">
                <label>Cantidad</label>
                <input type="text" name="cantidad" class="form-control" placeholder="Ingrese la cantidad" required />
            </div>
        </div>
    </div>
    <br>
    <div class="text-center">
        <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-floppy-o"></i> Guardar</button>
    </div>
</form>
