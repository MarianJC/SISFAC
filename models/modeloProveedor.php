<?php

require_once ROOT_PATH."libs/conexion.php";

class ModeloProveedor{

    private $con;

    public function __construct(){
        try{
            $cnn = new Conexion();
            $this->con = $cnn->getConectar();
        } catch (Exception $e){
             die($e.getMessage());
       }
    }
    
    public function listaProveedores(){
        try {            
            $lista = $this->con->prepare("select * from proveedores");
            $lista->execute();
            $res = $lista->fetchAll(PDO::FETCH_ASSOC);
            return $res;

        }catch (Exception $e) {
			die('Error: '.$e->getMessage());
		} finally{
            $res=null;
        }
    }

    public function buscaProveedor($id){
        try {            
            $busca = $this->con->prepare("select * from proveedores where idproveedor = :idprove");
            $busca->bindParam(":idprove", $id);
            $busca->execute();
            $res = $busca->fetch(PDO::FETCH_ASSOC);
            return $res;

        }catch (Exception $e) {
			die('Error: '.$e->getMessage());
		} finally{
            $res=null;
        }
    }

    public function guardarProveedor($data){
        try {
            $query = $this->con->prepare("insert into proveedores (nomproveedor, rucproveedor, dirproveedor, telproveedor, emailproveedor) 
                values (:nomprove, :rucprove, :dirprove, :telprove, :email)");
    
            $query->bindParam(":nomprove", $data['nomproveedor']);
            $query->bindParam(":rucprove", $data['rucproveedor']);
            $query->bindParam(":dirprove", $data['dirproveedor']);
            $query->bindParam(":telprove", $data['telproveedor']);
            $query->bindParam(":email", $data['emailproveedor']);
            
            $query->execute();
    
            return true;
    
        } catch (Exception $e) {
            die('Error: '.$e->getMessage());
        } finally {
            $res = false;
        }
    }
    
    public function actualizarProveedor($data){
        try {            
            $query = $this->con->prepare("update proveedores
                set nomproveedor=:nomprove,
                    rucproveedor=:rucprove,
                    dirproveedor=:dirprove,
                    telproveedor=:telprove,
                    emailproveedor=:email
                where idproveedor=:idprove");

            $query->bindParam(":nomprove",$data['nomproveedor']);
            $query->bindParam(":rucprove",$data['rucproveedor']);
            $query->bindParam(":dirprove",$data['dirproveedor']);
            $query->bindParam(":telprove",$data['telproveedor']);
            $query->bindParam(":email",$data['emailproveedor']);
            $query->bindParam(":idprove",$data['idproveedor']);
            $query->execute();

            return true;

        }catch (Exception $e) {
			die('Error: '.$e->getMessage());
		} finally{
            $res=false;
        }
    }
    
    public function borraProveedor($id){
        try {
            $borra = $this->con->prepare("delete from proveedores where idproveedor = :idprove");
            $borra->bindParam(":idprove", $id);
            $borra->execute();
            
            return true;
    
        } catch (Exception $e) {
            die('Error: '.$e->getMessage());
        } finally {
            $res = null;
        }
    }
}
