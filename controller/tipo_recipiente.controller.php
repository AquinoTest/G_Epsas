<?php

require_once 'model/tipo_recipiente.php';
require_once 'view/tipo_recipiente/tipo_recipiente.view.php';

class Tipo_RecipienteController {

    private $model;
    private $vista;

    public function __CONSTRUCT() {
        $this->model = new TipoRecipiente();
        $this->vista = new TipoRecipienteView();
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
            'nombre' => $_POST['nombre'],
            'descripcion' => $_POST['descripcion']
        );
        $this->model->Guardar($datos);
        header("Location: ?c=tipo_recipiente");
    }

    public function Eliminar() {
        $this->model->Eliminar($_REQUEST['pkarea']);
        header('Location: ?c=area&item=area&tarea=eliminar&exito=si');
    }
}

?>