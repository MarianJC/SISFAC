<?php

require_once ROOT_PATH."models/modeloVenta.php";

class VentaController{

    private $modelo;

    public function __construct(){

        $this->modelo = new ModeloVenta();

    }

    public function index(){

        $datos = $this->modelo->listaVentas();
       
        require_once ROOT_PATH."views/venta/listado.php";

    }

    public function nuevo(){

        require_once ROOT_PATH."views/venta/nuevaVenta.php";
    }

    public function guardar(){
        
        $datos = array(
            'idcliente' => $_POST["idcli"],
            'idusuario' => $_POST["idus"],
            'idcondicion' => $_POST["idcon"],
            'valorventa' => $_POST["subtotal"],
            'igv' => $_POST["igv"],
        );

        $this->modelo->guardarVenta($datos);
        
        $this->index();
    }

}