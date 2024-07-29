<?php

require_once ROOT_PATH."models/modeloCondicion.php";

class CondicionController{

    private $modelo;

    public function __construct(){

        $this->modelo = new ModeloCondicion();

    }

}