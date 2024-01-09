<?php

class venta {
    
    public $num;
    public $codCli;
    public $fecha;
    
    function __construct($num, $codCli, $fecha) {
        $this->num = $num;
        $this->codCli = $codCli;
        $this->fecha = $fecha;
    }

    function getNum() {
        return $this->num;
    }

    function getCodCli() {
        return $this->codCli;
    }

    function getFecha() {
        return $this->fecha;
    }

    function setNum($num) {
        $this->num = $num;
    }

    function setCodCli($codCli) {
        $this->codCli = $codCli;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }


    
}
