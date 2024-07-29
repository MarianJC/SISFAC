<?php

require_once ROOT_PATH."libs/conexion.php";

class ModeloDetalleVenta{

    private $con;

    public function __construct(){
        try{
            $cnn = new Conexion();
            $this->con = $cnn->getConectar();
        } catch (Exception $e){
             die($e.getMessage());
       }
    }
    
    public function listaDetalle(){
        try {            
            $lista = $this->con->prepare("select * from detallefactura");
            $lista->execute();
            $res = $lista->fetchAll(PDO::FETCH_ASSOC);
            return $res;

        }catch (Exception $e) {
			die('Error: '.$e->getMessage());
		} finally{
            $res=null;
        }
    }

    public function guardarDetalle($data){
        try {            
            $query = $this->con->prepare("insert into detallefactura (idfactura, idproducto, cant, cosuni, preuni) 
                values (:idfac, :idprod, :cant, :cosuni, :preuni)");

            $query->bindParam(":idfac",$data['idfactura']);
            $query->bindParam(":idprod",$data['idproducto']);
            $query->bindParam(":cant",$data['cant']);
            $query->bindParam(":cosuni",$data['cosuni']);
            $query->bindParam(":preuni",$data['preuni']);

            $query->execute();

            return true;

        }catch (Exception $e) {
			die('Error: '.$e->getMessage());
		} finally{
            $res=false;
        }
    }

}