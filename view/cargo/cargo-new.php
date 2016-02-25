<body>
<h1 class="page-header">
    <?php echo 'Nuevo Cargo'; ?>
</h1>

<ol class="breadcrumb" style="background-color: white;">
    <li><a href="?c=cargo" style="color:black;">Cargo</a></li>
    <li class="active"><?php echo 'Nuevo Registro'; ?></li>
</ol>

<form action="?c=cargo&a=guardar" method="post" autocomplete="off">
    <input type="hidden" name="pkusuario" value="0" />
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="nombre" class="form-control" 
                       placeholder="Ingrese el Nombre" required >
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>Descripcion</label>
                <input type="text" name="descripcion" class="form-control" 
                       placeholder="Ingrese la Descripcion" required />
            </div>
        </div>
    </div>
    <br>
    <div class="text-center">
        <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-floppy-o"></i> Guardar</button>
    </div>
</form>
</body>

