<?php

require_once 'model/cliente.php';
require_once 'view/cliente/cliente.view.php';
//require_once 'model/facade/facade_model.php';

class ClienteController {

    private $model;
    private $vista;
    private $facade_model;

    public function __CONSTRUCT() {
        $this->model = new Cliente();
        $this->vista = new ClienteView();
        //$this->facade_model = new Facade_Model();
    }

    public function Index() {
        $lista = $this->model->Listar_Clientes();
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
            'ci' => $_POST['ci'],
            'nombre' => $_POST['nombre'],
            'direccion' => $_POST['direccion'],
            'telefono' => $_POST['telefono'],
            'departamento' => $_POST['departamento'],
            'tipo_cliente' => $_POST['tipo_cliente']
        );
        $this->model->Registrar_Cliente($datos);
        header("Location: ?cliente");
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