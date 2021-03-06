<?php

require_once 'singleton/database.php';

class TipoRecipiente {

    private $pdo;

    public function __CONSTRUCT() {
        try {
            $this->pdo = Singleton::getInstance()->getPDO();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Listar() {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM tipo_recipiente WHERE estado=1");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Eliminar($pkarea) {
        try {
            $stm = $this->pdo->prepare("UPDATE area SET estado=0 WHERE pkarea = ?");

            $stm->execute(array($pkarea));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Actualizar($data) {
        try {
            $sql = "UPDATE area "
                . "SET nombre=? , "
                . "sigla=?, "
                . "estado=?,  "
                . "observacion=?  "
                . "WHERE pkarea = ?";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data['nombre'],
                        $data['sigla'],
                        $data['estado'],
                        $data['observacion'],
                        $data['pkarea']
                    )
                );
        } catch (exception $e) {
            die($e->getmessage());
        }
    }

    public function Guardar($datos) {
        try {
            $sql = "INSERT INTO tipo_recipiente (nombre,descripcion) VALUES (?,?)";
            $this->pdo->prepare($sql)->execute(
                array(
                    $datos['nombre'],
                    $datos['descripcion']
                )
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
?>