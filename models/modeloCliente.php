<?php

require_once ROOT_PATH."libs/conexion.php";

class ModeloCliente{

    private $con;

    public function __construct(){
        try{
            $cnn = new Conexion();
            $this->con = $cnn->getConectar();
        } catch (Exception $e){
             die($e.getMessage());
       }
    }
    
    public function listaClientes(){
        try {            
            $lista = $this->con->prepare("select * from clientes");
            $lista->execute();
            $res = $lista->fetchAll(PDO::FETCH_ASSOC);
            return $res;

        }catch (Exception $e) {
			die('Error: '.$e->getMessage());
		} finally{
            $res=null;
        }
    }

    public function buscaCliente($id){
        try {            
            $busca = $this->con->prepare("select * from clientes where idcliente = :idcli");
            $busca->bindParam(":idcli", $id);
            $busca->execute();
            $res = $busca->fetch(PDO::FETCH_ASSOC);
            return $res;

        }catch (Exception $e) {
			die('Error: '.$e->getMessage());
		} finally{
            $res=null;
        }
    }

    public function guardarCliente($data){
        try {
            $query = $this->con->prepare("insert into clientes (nomcliente, ruccliente, dircliente, telcliente, emailcliente) 
                values (:nomcli, :ruccli, :dircli, :telcli, :email)");
    
            $query->bindParam(":nomcli", $data['nomcliente']);
            $query->bindParam(":ruccli", $data['ruccliente']);
            $query->bindParam(":dircli", $data['dircliente']);
            $query->bindParam(":telcli", $data['telcliente']);
            $query->bindParam(":email", $data['emailcliente']);
            
            $query->execute();
    
            return true;
    
        } catch (Exception $e) {
            die('Error: '.$e->getMessage());
        } finally {
            $res = false;
        }
    }
    
    public function actualizarCliente($data){
        try {            
            $query = $this->con->prepare("update clientes
                set nomcliente=:nomcli,
                    ruccliente=:ruccli,
                    dircliente=:dircli,
                    telcliente=:telcli,
                    emailcliente=:email
                where idcliente=:idcli");

            $query->bindParam(":nomcli",$data['nomcliente']);
            $query->bindParam(":ruccli",$data['ruccliente']);
            $query->bindParam(":dircli",$data['dircliente']);
            $query->bindParam(":telcli",$data['telcliente']);
            $query->bindParam(":email",$data['emailcliente']);
            $query->bindParam(":idcli",$data['idcliente']);
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
            $borra = $this->con->prepare("delete from clientes where idcliente = :idcli");
            $borra->bindParam(":idcli", $id);
            $borra->execute();
            
            return true;
    
        } catch (Exception $e) {
            die('Error: '.$e->getMessage());
        } finally {
            $res = null;
        }
    }
}