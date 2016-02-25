<?php

class CargoView{
   
    public function View($lista){
        require_once 'view/header.php';
        require_once 'view/cargo/cargo-admin.php';
        require_once 'view/footer.php';
    }
    
    public function Nuevo(){   
        require_once 'view/header.php';
        require_once 'view/cargo/cargo-new.php';
        require_once 'view/footer.php';
    }
    
     public function Editar($area){
        require_once 'view/header.php';
        require_once 'view/area/area-editar.php';
        require_once 'view/footer.php';
    }

 
}