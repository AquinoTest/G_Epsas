<?php

require_once 'model/tipo_cliente.php';
require_once 'view/tipo_cliente/tipo_cliente.view.php';

class Tipo_ClienteController {

    private $model;
    private $vista;

    public function __CONSTRUCT() {
        $this->model = new TipoCliente();
        $this->vista = new TipoClienteView();
    }

    public function Index() {
        $lista = $this->model->Listar();
        $this->vista->View($lista);
    }

    public function Nuevo() {
        $this->vista->Nuevo();
    }

    public function Editar() {
        $area = $this->model->Obtener($_REQUEST['pkarea']);
        $this->vista->Editar($area);
    }

    public function Guardar() {
        $datos = array(
            'sigla' => $_POST['sigla'],
            'nombre' => $_POST['nombre'],
            'descripcion' => $_POST['descripcion'],
            'cantidad' => $_POST['cantidad']
        );
        $this->model->Guardar($datos);
        header("Location: ?c=tipo_cliente");
    }

    public function Eliminar() {
        $this->model->Eliminar($_REQUEST['pkarea']);
        header('Location: ?c=area&item=area&tarea=eliminar&exito=si');
    }
}

?>