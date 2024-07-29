<?php

require_once ROOT_PATH."libs/conexion.php";

class ModeloCondicion{

    private $con;

    public function __construct(){
        try{
            $cnn = new Conexion();
            $this->con = $cnn->getConectar();
        } catch (Exception $e){
             die($e.getMessage());
       }
    }
    
    public function listaCondicion(){
        try {            
            $lista = $this->con->prepare("select * from condicionventa");
            $lista->execute();
            $res = $lista->fetchAll(PDO::FETCH_ASSOC);
            return $res;

        }catch (Exception $e) {
			die('Error: '.$e->getMessage());
		} finally{
            $res=null;
        }
    }

}
