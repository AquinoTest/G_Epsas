<?php

require_once 'model/tipo_muestra.php';
require_once 'view/tipo_muestra/tipo_muestra.view.php';

class Tipo_MuestraController {

    private $model;
    private $vista;

    public function __CONSTRUCT() {
        $this->model = new TipoMuestra();
        $this->vista = new TipoMuestraView();
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
            'nombre' => $_POST['nombre']
        );
        $this->model->Guardar($datos);
        header("Location: ?c=tipo_muestra");
    }

    public function Eliminar() {
        $this->model->Eliminar($_REQUEST['pkarea']);
        header('Location: ?c=area&item=area&tarea=eliminar&exito=si');
    }
}

?>