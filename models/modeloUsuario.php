<?php

require_once ROOT_PATH."libs/conexion.php";

class ModeloUsuario{

    private $con;

    public function __construct(){
        try{
            $cnn = new Conexion();
            $this->con = $cnn->getConectar();
        } catch (Exception $e){
            die($e.getMessage());
        }
    }

    public function getUsuarioNombre($nom){
        try {            
            $query = $this->con->prepare("select * from usuarios where nomusuario=:nomus");
            $query->bindParam(":nomus",$nom);
            $query->execute();
            $res = $query->fetch(PDO::FETCH_ASSOC);
            return $res;

        }catch (Exception $e) {
			die('Error: '.$e->getMessage());
		} finally{
            $res=null;
        }
    }

    public function listaUsuarios(){
        try {            
            $lista = $this->con->prepare("select * from usuarios");
            $lista->execute();
            $res = $lista->fetchAll(PDO::FETCH_ASSOC);
            return $res;

        }catch (Exception $e) {
			die('Error: '.$e->getMessage());
		} finally{
            $res=null;
        }
    }

    public function buscaUsuario($id){
        try {            
            $busca = $this->con->prepare("select * from usuarios where idusuario = :idus");
            $busca->bindParam(":idus", $id);
            $busca->execute();
            $res = $busca->fetch(PDO::FETCH_ASSOC);
            return $res;

        }catch (Exception $e) {
			die('Error: '.$e->getMessage());
		} finally{
            $res=null;
        }
    }

    public function guardarUsuario($data){
        try {
            $query = $this->con->prepare("insert into usuarios (nomusuario, password, apellidos, nombres, email, estado) 
                values (:nomus, :pass, :apell, :nom, :email, :estado)");
    
            $query->bindParam(":nomus", $data['nomusuario']);
            $query->bindParam(":pass", $data['password']);
            $query->bindParam(":apell", $data['apellidos']);
            $query->bindParam(":nom", $data['nombres']);
            $query->bindParam(":email", $data['email']);
            $query->bindParam(":estado", $data['estado']);
            
            $query->execute();
    
            return true;
    
        } catch (Exception $e) {
            die('Error: '.$e->getMessage());
        } finally {
            $res = false;
        }
    }
    
    public function actualizarUsuario($data){
        try {            
            $query = $this->con->prepare("update usuarios
                set nomusuario=:nomus,
                    password=:pass,
                    apellidos=:apell,
                    nombres=:nom,
                    email=:email,
                    estado=:estado
                where idusuario=:idus");

            $query->bindParam(":nomus",$data['nomusuario']);
            $query->bindParam(":pass",$data['password']);
            $query->bindParam(":apell",$data['apellidos']);
            $query->bindParam(":nom",$data['nombres']);
            $query->bindParam(":email",$data['email']);
            $query->bindParam(":estado",$data['estado']);
            $query->bindParam(":idus",$data['idusuario']);
            $query->execute();

            return true;

        }catch (Exception $e) {
			die('Error: '.$e->getMessage());
		} finally{
            $res=false;
        }
    }
    
    public function borraCliente($id){
        try {
            $borra = $this->con->prepare("delete from usuarios where idusuario = :idus");
            $borra->bindParam(":idus", $id);
            $borra->execute();
            
            return true;
    
        } catch (Exception $e) {
            die('Error: '.$e->getMessage());
        } finally {
            $res = null;
        }
    }  
}