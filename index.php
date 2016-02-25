<?php

//require_once 'model/singleton/database.php';
//require_once 'model/facade/facade_model.php';
//require_once 'model/usuario.php';

session_start();

$_controllers_permitidos = array("cliente","cargo","usuario","tipo_cliente","tipo_muestra","tipo_recipiente");
$_acciones_permitidos = array("enviar");


// Todo esta lógica hara el papel de un FrontController
if (!isset($_REQUEST['c'])) {
    //Si no existe el controlador
    if (!isset($_SESSION['usuario'])) {
        header('Location: login.php');
    }
    else
    {
        require_once 'view/header.php';
        require_once 'view/panel.php';
        require_once 'view/footer.php';
    }
} else {
    // Obtenemos el controlador que queremos cargar
    $controller = strtolower($_REQUEST['c']);
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';
    


    // Instanciamos el controlador
    if (file_exists("controller/$controller.controller.php") && is_readable("controller/$controller.controller.php")) {

        //Validacion de privilegios del usuario que se encuentra en esta session

        if (!in_array($controller,$_controllers_permitidos) ) {    
                //$facademodel = new Facade_Model();
                $menu = $facademodel->obtenerMenu($_SESSION['user_sistem']);
  
                //$permiso = $facademodel->validarPrivilegios($controller, $menu);                   
                //if (!$facademodel->validarPrivilegios($controller, $menu)) {
                  //       header('Location: index.php');
                //}   
        
        }
        //
        require_once ("controller/".$controller.".controller.php");
        $controller = ucwords($controller) . 'Controller';
        $controller = new $controller;
        if (method_exists($controller, $accion)) {
            call_user_func(array($controller, $accion));
        } else {
            header('Location: index.php');
        }
    } else {
        header('Location: index.php');
    }
}