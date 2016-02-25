<?php

require_once 'model/usuario.php';
require_once 'view/usuario/usuario.view.php';
require_once 'resources/mail/correo.php';
//require_once 'model/facade/facade_model.php';

class UsuarioController {

    private $model;
    private $vista;
    private $facade_model;
    private $correo;

    public function __CONSTRUCT() {
        $this->model = new Usuario();
        $this->vista = new UsuarioView();
        $this->correo= new Correo();
        //$this->facade_model = new Facade_Model();
    }

    public function Index() {
        $lista = $this->model->Listar_Usuarios();
        $this->vista->View($lista);
    }

    public function Nuevo() {
        $cargos=$this->model->Obtener_Cargos();
        $this->vista->Nuevo($cargos);
    }

    public function Editar() {
        $area = $this->model->Obtener($_REQUEST['pkarea']);
        $this->vista->Editar($area);
    }

    public function Guardar() {
        $datos = array(
            'ci' => $_POST['ci'],
            'nombre' => $_POST['nombre'],
            'email' => $_POST['correo'],
            'telefono' => $_POST['telefono'],
            'username' => $_POST['username'],
            'pass' => $this->Encrypt($_POST['pass']),
            'fkcargo' => $_POST['cargo']
        );
        $this->model->Registrar_Usuarios($datos);
        header("Location: ?c=usuario");
    }

    public function Eliminar() {
        $this->model->Eliminar($_REQUEST['pkarea']);
        header('Location: ?c=area&item=area&tarea=eliminar&exito=si');
    }

    public function Acceder() {
        if ((isset($_POST['username']) && isset($_POST['password']) ) &&
                (!empty($_POST['username']) && !empty($_POST['password']))) {
            $user = $this->model->Acceder($_POST['username'], $this->Encrypt($_POST['password']));
            foreach ($user as $u) {
                $pkusuario=$u->pkusuario;
                $cargo=$u->cargo;
            }
            if ($user) {
                $_SESSION['usuario'] = (int)$pkusuario;
                $_SESSION['cargo'] = $cargo;
                header('Location: index.php');
            } else {
                header('Location: login.php?hell');
                echo '<script language="javascript">alert("Datos incorrectos");</script>';
            }
        } else {
            header('Location: login.php');
        }
    }

    public function Recuperar_Pass() {
        $correo="ramiroaquinoromero@gmail.com";
        $usuario = $this->model->Mail_User($_POST['email']);
        foreach ($usuario as $u) {
            $pass=$this->Decrypt($u->pass);
            $nombre=$u->cargo;
            $ci=$u->ci;
        }
        if($correo != null) {
            $this->correo->setAddress($_POST['email']);
            $this->correo->setSubject("Cambiar Password");
            $this->correo->setBody("Correo Enviado al señor $nombre con $ci y su Password es $pass");
            if($this->correo->sendEmail()){
                echo '<script language="javascript">alert("Se envio el Correo");</script>';
                //$this->model->GuargarCodigo($_REQUEST['email'],$codigo);
            }
            else
            {
                echo "No se envio el correo";
                exit;
            }
        }
        header('Location: login.php');
    }

    public function Enviar() {
        $usuario = $this->model->ObtenerConCorreo($_REQUEST['email']);
        if($usuario != null) {
            $salt = 'TITBOL@2015';
            //$codigo = hash('sha256', $salt . rand(5,2016));
            $this->correo->setAddress($_REQUEST['email']);
            $this->correo->setSubject("Cambiar Password");
            $this->correo->setBody("Para cambiar su password haga click en este enlace:<br>"
                . "http://localhost/demo/index.php?c=usuario&a=activar&p=$usuario->pkusuario&k=$codigo");
            if($this->correo->sendEmail()){
                $this->model->GuargarCodigo($_REQUEST['email'],$codigo);
            }
        }
        header('Location: login.php');
    }



    public function Encrypt($cadena){
        $key='Aquino';  // Una clave de codificacion, debe usarse la misma para encriptar y desencriptar
        $encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $cadena, MCRYPT_MODE_CBC, md5(md5($key))));
        return $encrypted; //Devuelve el string encriptado
 
    }
 
    public function Decrypt($cadena){
         $key='Aquino';  // Una clave de codificacion, debe usarse la misma para encriptar y desencriptar
         $decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($cadena), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
        return $decrypted;  //Devuelve el string desencriptado
    }

}

?>