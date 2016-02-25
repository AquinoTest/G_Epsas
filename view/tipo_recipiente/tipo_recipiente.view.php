<?php

class TipoRecipienteView{

    public function View($lista){
        require_once 'view/header.php';
        require_once 'view/tipo_recipiente/tipo_recipiente-admin.php';
        require_once 'view/footer.php';
    }

    public function Nuevo(){
        require_once 'view/header.php';
        require_once 'view/tipo_recipiente/tipo_recipiente-new.php';
        require_once 'view/footer.php';
    }

    public function Editar(){
        require_once 'view/header.php';
        require_once 'view/tipo_recipiente/tipo_recipiente-editar.php';
        require_once 'view/footer.php';
    }

}

?>