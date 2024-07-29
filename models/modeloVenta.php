<?php

require_once ROOT_PATH."libs/conexion.php";

class ModeloVenta{

    private $con;

    public function __construct(){
        try{
            $cnn = new Conexion();
            $this->con = $cnn->getConectar();
        } catch (Exception $e){
             die($e.getMessage());
       }

    }
    
    public function listaVentas(){
        try {            
            $lista = $this->con->prepare("select a.idfactura, b.nombres, c.nomcliente, a.idcondicion, a.valorventa, a.igv, a.valorventa+a.igv as total
            from facturas a, usuarios b, clientes c
            where a.idusuario=b.idusuario and a.idcliente=c.idcliente");
            $lista->execute();
            $res = $lista->fetchAll(PDO::FETCH_ASSOC);
            return $res;

        }catch (Exception $e) {
			die('Error: '.$e->getMessage());
		} finally{
            $res=null;
        }
    }

    public function guardarVenta($data){
        try {            
            $query = $this->con->prepare("insert into facturas (idcliente, idusuario, idcondicion, valorventa, igv) 
                values (:idcli, :idus, :idcon, :subtotal, :igv)");

            $query->bindParam(":idcli",$data['idcliente']);
            $query->bindParam(":idus",$data['idusuario']);
            $query->bindParam(":idcon",$data['idcondicion']);
            $query->bindParam(":subtotal",$data['valorventa']);
            $query->bindParam(":igv",$data['igv']);

            $query->execute();

            return true;

        }catch (Exception $e) {
			die('Error: '.$e->getMessage());
		} finally{
            $res=false;
        }
    }
    

}