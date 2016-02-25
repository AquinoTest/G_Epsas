<?php

require_once 'singleton/database.php';

class Cliente {

    private $pdo;

    public function __CONSTRUCT() {
        try {
            $this->pdo = Singleton::getInstance()->getPDO();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Listar_Clientes() {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM cliente WHERE estado=1");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function ObtenerU($pkusuario) {
        try {
            $stm = $this->pdo
                ->prepare("SELECT a.nombre,a.pkarea FROM area a,usuario u WHERE u.pkusuario= ? and u.fkarea=a.pkarea");
            $stm->execute(array($pkusuario));

            return $stm->fetch(PDO::FETCH_BOTH);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function Eliminar($pkarea) {
        try {
            $stm = $this->pdo
                ->prepare("UPDATE area SET estado=0 WHERE pkarea = ?");

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

    public function Registrar_Cliente($datos) {
        try {
            $sql = "INSERT INTO cliente (ci,nombre,direccion,telefono,departamento,tipo_cliente) VALUES (?,?,?,?,?,?)";
            $this->pdo->prepare($sql)->execute(
                    array(
                        $datos['ci'],
                        $datos['nombre'],
                        $datos['direccion'],
                        $datos['telefono'],
                        $datos['departamento'],
                        $datos['tipo_cliente']
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

}

?>