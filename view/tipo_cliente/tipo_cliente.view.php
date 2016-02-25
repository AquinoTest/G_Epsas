<?php

class TipoClienteView{

    public function View($lista){
        require_once 'view/header.php';
        require_once 'view/tipo_cliente/tipo_cliente-admin.php';
        require_once 'view/footer.php';
    }

    public function Nuevo(){
        require_once 'view/header.php';
        require_once 'view/tipo_cliente/tipo_cliente-new.php';
        require_once 'view/footer.php';
    }

    public function Editar($area){
        require_once 'view/header.php';
        require_once 'view/tipo_cliente/tipo_cliente-editar.php';
        require_once 'view/footer.php';
    }


}

?>