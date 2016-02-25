<body>
<h1 class="page-header">
    <?php echo 'Nuevo Cliente'; ?>
</h1>

<ol class="breadcrumb" style="background-color: white;">
    <li><a href="?c=cliente" style="color:black;">Cliente</a></li>
    <li class="active"><?php echo 'Nuevo Registro'; ?></li>
</ol>

<form action="?c=cliente&a=guardar" method="post" autocomplete="off">
    <input type="hidden" name="pkusuario" value="0" />
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>CI</label>
                <input type="text" name="ci" class="form-control" 
                       placeholder="Ingrese el numero de carnet" required >
            </div>
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="nombre" class="form-control"  
                       placeholder="Ingrese el nombre" required />
            </div>
            <div class="form-group">
                <label>Telefono</label>
                <input type="text" name="telefono" class="form-control"  
                       placeholder="Ingrese el Telefono" required />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Direccion</label>
                <input type="text" name="direccion" class="form-control" 
                       placeholder="Ingrese la Direccion" required />
            </div>
            <div class="form-group">
                <label>Departamento</label>
                <input type="text" name="departamento" class="form-control"  
                       placeholder="Ingrese el Departamento" required />
            </div>
            <div class="form-group">
                    <label>Tipo de Cliente</label>
                    <select class="form-control" name="tipo_cliente" >
                        <option value="1">CI</option>
                        <option value=""></option>
                        <option value=""></option>
                        <option value=""></option>
                        <option value=""></option>
                    </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">

            </div>
            <div>
                
            </div>
        </div>
    </div>
    <br>
    <div class="text-center">
        <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-floppy-o"></i> Guardar</button>
    </div>
</form>
</body>

