<?php

require_once ROOT_PATH."models/modeloDetalleVenta.php";

class DetalleVentaController{

    private $modelo;

    public function __construct(){

        $this->modelo = new ModeloDetalleVenta();

    }

    public function index(){

        $datos = $this->modelo->listaDetalle();
       
        require_once ROOT_PATH."views/venta/listado.php";

    }

    public function nuevo(){

        require_once ROOT_PATH."views/venta/nuevaVenta.php";
    }

    public function guardarDV(){
        
        $datos = array(
            'idfactura' => $_POST["idfac"],
            'idproducto' => $_POST["idprod"],
            'cant' => $_POST["cant"],
            'cosuni' => $_POST["cosuni"],
            'preuni' => $_POST["preuni"],

            $query->bindParam(":idfactura",$data['idfac']);
            $query->bindParam(":idproducto",$data['idprod']);
            $query->bindParam(":cant",$data['cant']);
            $query->bindParam(":cosuni",$data['cosuni']);
            $query->bindParam(":preuni",$data['preuni']);
        );

        $this->modelo->guardarDetalle($datos);
        
        $this->index();
    }

}