<?php

class UsuarioView{
   
    public function View($lista){
        require_once 'view/header.php';
        require_once 'view/usuario/usuario-admin.php';
        require_once 'view/footer.php';
    }
    
    public function Nuevo($cargos){   
        require_once 'view/header.php';
        require_once 'view/usuario/usuario-new.php';
        require_once 'view/footer.php';
    }
    
     public function Editar($area){
        require_once 'view/header.php';
        require_once 'view/area/area-editar.php';
        require_once 'view/footer.php';
    }

 
}