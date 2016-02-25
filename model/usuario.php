<?php

require_once 'singleton/database.php';

class Usuario {

    private $pdo;

    public function __CONSTRUCT() {
        try {
            $this->pdo = Singleton::getInstance()->getPDO();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Listar_Usuarios() {
        try {
            $stm = $this->pdo->prepare("select u.pkusuario,u.nombre,u.ci,u.telefono,u.email,c.nombre as cargo from usuario u, cargo c where u.fkcargo=c.pkcargo and u.estado=1 and c.estado=1;");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Obtener_Cargos() {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM cargo WHERE estado=1");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Acceder($username,$pass) {
        try {
            $stm = $this->pdo->prepare("SELECT u.pkusuario,u.nombre,u.ci,u.telefono,u.email,c.nombre as cargo from usuario u,cargo c where u.fkcargo=c.pkcargo and u.username='".$username."' and u.pass='".$pass."' and u.estado=1;");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Mail_User($correo) {
        try {
            $stm = $this->pdo->prepare("SELECT u.pkusuario,u.nombre,u.ci,u.telefono,u.email,c.nombre as cargo,u.pass from usuario u,cargo c where u.fkcargo=c.pkcargo and u.email='".$correo."'  and u.estado=1;");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
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

    public function Registrar_Usuarios($datos) {
        try {
            $sql = "INSERT INTO usuario (ci,nombre,email,telefono,username,pass,fkcargo) VALUES (?,?,?,?,?,?,?)";
            $this->pdo->prepare($sql)->execute(
                    array(
                        $datos['ci'],
                        $datos['nombre'],
                        $datos['email'],
                        $datos['telefono'],
                        $datos['username'],
                        $datos['pass'],
                        $datos['fkcargo']
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

}

?>