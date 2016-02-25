<?php

class ClienteView{
   
    public function View($lista){
        require_once 'view/header.php';
        require_once 'view/cliente/cliente-admin.php';
        require_once 'view/footer.php';
    }
    
    public function Nuevo(){   
        require_once 'view/header.php';
        require_once 'view/cliente/cliente-new.php';
        require_once 'view/footer.php';
    }
    
     public function Editar($area){
        require_once 'view/header.php';
        require_once 'view/area/area-editar.php';
        require_once 'view/footer.php';
    }

 
}