<?php

require_once ROOT_PATH."libs/conexion.php";

class ModeloProducto{

    private $con;

    public function __construct(){
        try{
            $cnn = new Conexion();
            $this->con = $cnn->getConectar();
        } catch (Exception $e){
             die($e.getMessage());
       }
    }
    
    public function listaProductos(){
        try {            
            $lista = $this->con->prepare("select * from productos");
            $lista->execute();
            $res = $lista->fetchAll(PDO::FETCH_ASSOC);
            return $res;

        }catch (Exception $e) {
			die('Error: '.$e->getMessage());
		} finally{
            $res=null;
        }
    }

    public function buscaProducto($id){
        try {            
            $busca = $this->con->prepare("select * from productos where idproducto = :idprodu");
            $busca->bindParam(":idprodu", $id);
            $busca->execute();
            $res = $busca->fetch(PDO::FETCH_ASSOC);
            return $res;

        }catch (Exception $e) {
			die('Error: '.$e->getMessage());
		} finally{
            $res=null;
        }
    }

    public function guardarProducto($data){
        try {            
            $query = $this->con->prepare("insert into productos (nomproducto, unimed, stock, cosuni, preuni, idcategoria, idproveedor, estado) 
                values (:nomprodu, :unimed, :stock, :cosuni, :preuni, :categoria, :proveedor, :estado)");

            $query->bindParam(":nomprodu",$data['nomproducto']);
            $query->bindParam(":unimed",$data['unimed']);
            $query->bindParam(":stock",$data['stock']);
            $query->bindParam(":cosuni",$data['cosuni']);
            $query->bindParam(":preuni",$data['preuni']);
            $query->bindParam(":categoria",$data['idcategoria']);
            $query->bindParam(":proveedor",$data['idproveedor']);
            $query->bindParam(":estado",$data['estado']);

            $query->execute();

            return true;

        }catch (Exception $e) {
			die('Error: '.$e->getMessage());
		} finally{
            $res=false;
        }
    }
    
    public function actualizarProducto($data){
        try {            
            $query = $this->con->prepare("update productos
                set nomproducto=:nomprodu,
                    unimed=:unimed,
                    stock=:stock,
                    cosuni=:cosuni,
                    preuni=:preuni,
                    idcategoria=:categoria,
                    idproveedor=:proveedor,
                    estado=:estado
                where idproducto=:idprodu");

            $query->bindParam(":nomprodu",$data['nomproducto']);
            $query->bindParam(":unimed",$data['unimed']);
            $query->bindParam(":stock",$data['stock']);
            $query->bindParam(":cosuni",$data['cosuni']);
            $query->bindParam(":preuni",$data['preuni']);
            $query->bindParam(":categoria",$data['idcategoria']);
            $query->bindParam(":proveedor",$data['idproveedor']);
            $query->bindParam(":estado",$data['estado']);
            $query->bindParam(":idprodu",$data['idproducto']);
            $query->execute();

            return true;

        }catch (Exception $e) {
			die('Error: '.$e->getMessage());
		} finally{
            $res=false;
        }
    }
    
    public function borraProducto($id){
        try {            
            $borra = $this->con->prepare("delete from productos where idproducto = :idprodu");
            $borra->bindParam(":idprodu", $id);
            $borra->execute();
            
            return true;

        }catch (Exception $e) {
			die('Error: '.$e->getMessage());
		} finally{
            $res=null;
        }
    }

    

}