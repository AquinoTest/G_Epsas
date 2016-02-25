<?php

class TipoMuestraView{

    public function View($lista){
        require_once 'view/header.php';
        require_once 'view/tipo_muestra/tipo_muestra-admin.php';
        require_once 'view/footer.php';
    }

    public function Nuevo(){
        require_once 'view/header.php';
        require_once 'view/tipo_muestra/tipo_muestra-new.php';
        require_once 'view/footer.php';
    }

    public function Editar(){
        require_once 'view/header.php';
        require_once 'view/tipo_muestra/tipo_muestra-editar.php';
        require_once 'view/footer.php';
    }


}

?>