<?php

require_once ROOT_PATH."libs/conexion.php";

class ModeloCategoria{

    private $con;

    public function __construct(){
        try{
            $cnn = new Conexion();
            $this->con = $cnn->getConectar();
        } catch (Exception $e){
             die($e.getMessage());
       }
    }
    
    public function listaCategorias(){
        try {            
            $lista = $this->con->prepare("select * from categorias");
            $lista->execute();
            $res = $lista->fetchAll(PDO::FETCH_ASSOC);
            return $res;

        }catch (Exception $e) {
			die('Error: '.$e->getMessage());
		} finally{
            $res=null;
        }
    }

    public function buscaCategoria($id){
        try {            
            $busca = $this->con->prepare("select * from categorias where idcategoria = :idcat");
            $busca->bindParam(":idcat", $id);
            $busca->execute();
            $res = $busca->fetch(PDO::FETCH_ASSOC);
            return $res;

        }catch (Exception $e) {
			die('Error: '.$e->getMessage());
		} finally{
            $res=null;
        }
    }

    public function guardarCategoria($data){
        try {
            $query = $this->con->prepare("insert into categorias (nomcategoria) 
                values (:nomcat)");
                
            $query->bindParam(":nomcat", $data['nomcategoria']);
            
            $query->execute();
    
            return true;
    
        } catch (Exception $e) {
            die('Error: '.$e->getMessage());
        } finally {
            $res = false;
        }
    }
    
    public function actualizarCategoria($data){
        try {            
            $query = $this->con->prepare("update categorias
                set nomcategoria=:nomcat
                where idcategoria=:idcat");

            $query->bindParam(":nomcat",$data['nomcategoria']);
            $query->bindParam(":idcat",$data['idcategoria']);
            $query->execute();

            return true;

        }catch (Exception $e) {
			die('Error: '.$e->getMessage());
		} finally{
            $res=false;
        }
    }
    
    public function borraCategoria($id){
        try {
            $borra = $this->con->prepare("delete from categorias where idcategoria = :idcat");
            $borra->bindParam(":idcat", $id);
            $borra->execute();
            
            return true;
    
        } catch (Exception $e) {
            die('Error: '.$e->getMessage());
        } finally {
            $res = null;
        }
    }
}
