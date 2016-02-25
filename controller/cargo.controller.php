<?php

require_once 'model/cargo.php';
require_once 'view/cargo/cargo.view.php';
//require_once 'model/facade/facade_model.php';

class CargoController {

    private $model;
    private $vista;
    private $facade_model;

    public function __CONSTRUCT() {
        $this->model = new Cargo();
        $this->vista = new CargoView();
        //$this->facade_model = new Facade_Model();
    }

    public function Index() {
        $lista = $this->model->Listar_Cargos();
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
        $this->model->Registrar_Cargos($datos);
        header("Location: ?c=cargo");
        //header('Location: ?c=area&item=area&tarea=agregar&exito=si');
    }

    public function Eliminar() {
        $this->model->Eliminar($_REQUEST['pkarea']);
        header('Location: ?c=area&item=area&tarea=eliminar&exito=si');
    }

    public function validar() {
        if (!isset($_SESSION['user_sistem'])) {
            header('Location: ?c=area');
        }
    }

}

?>