<?php
class Venta {
    private $numero;
    private $objFecha;
    private $objCliente;
    private $objColeccionMotos; //arreglo
    private $precioFinal;

    //metodo constructor
    public function __construct($numero,$objFecha,$objCliente,$objColeccionMotos,$precioFinal){
        $this->numero = $numero;
        $this->objFecha = $objFecha;
        $this->objCliente = $objCliente;
        $this->objColeccionMotos = $objColeccionMotos;
        $this->precioFinal = $precioFinal;
    }

    //metodo de acceso
    public function getNumero (){
        return $this->numero;
    }

    public function getObjFecha (){
        return $this->objFecha;
    }

    public function getObjCliente(){
        return $this->objCliente;
    }

    public function getObjColeccionMotos (){
        return $this->objColeccionMotos;
    }

    public function getPrecioFinal (){
        return $this->precioFinal;
    }

    //metodo de modificacion

    public function setNumero ($numero){
        $this->numero = $numero;
    }

    public function setObjFecha ($objFecha){
        $this->objFecha = $objFecha;
    }

    public function setObjCliente ($objCliente){
        $this->objCliente = $objCliente;
    }

    public function SetObjColeccionMotos ($objColeccionMotos){
        $this->objColeccionMotos = $objColeccionMotos;
    }

    public function SetPrecioFinal ($precioFinal){
        $this->precioFinal = $precioFinal;
    }

    //metodos

    public function motos(){
        $result = '';
        $moto = $this->getObjColeccionMotos();
        foreach ($moto as $motoActual) {
            $result .= $motoActual . "\n";
        }
        return $result;
    }

    //incorporo el obj moto a la coleccion de motos y seteo el nuevo precio
    public function incorporarMoto($objMoto){
        if ($objMoto->getMotoActiva()) {
            $coleMotos = $this->getObjColeccionMotos();
            array_push($coleMotos,$objMoto);
            $this->SetObjColeccionMotos($coleMotos);
            $this->SetPrecioFinal($objMoto->darPrecioVenta());
        }
    }


    public function _toString (){
        $motos = $this->motos();
        if ($motos === '') {
           $motos = "Ninguna moto ha sido vendida";
        }
        return "Numero de venta: " .$this->getNumero() ."\nFecha de venta: " .$this->getObjFecha(). "\nCliente: " .$this->objCliente().
        "\nColeccion de motos vendidas: " .$motos . "\nPrecio final: " .$this->getPrecioFinal();
    }
}
