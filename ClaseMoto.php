<?php
class Moto {
    private $codigo;
    private $costo;
    private $anioFabricacion;
    private $descripcion;
    private $porcentajeAnual;
    private $motoActiva;

    //metodo constructor
    public function __construct($codigo,$costo,$anioFabricacion,$descripcion,$porcentajeAnual,$motoActiva){
        $this->codigo = $codigo;
        $this->costo = $costo;
        $this->anioFabricacion = $anioFabricacion;
        $this->descripcion = $descripcion;
        $this->porcentajeAnual = $porcentajeAnual;
        $this->motoActiva = $motoActiva;
    }

    //metodo de acceso
    public function getCodigo (){
        return $this->codigo;
    }

    public function getCosto (){
        return $this->costo;
    }

    public function getAnioFabricacion(){
        return $this->anioFabricacion;
    }

    public function getDescripcion (){
        return $this->descripcion;
    }

    public function getPorcentajeAnual (){
        return $this->porcentajeAnual;
    }

    public function getMotoActiva (){
        return $this->motoActiva;
    }

    //metodo de modificacion

    public function setCodigo ($codigo){
        $this->codigo = $codigo;
    }

    public function setCosto ($costo){
        $this->costo = $costo;
    }

    public function setAnioFabricacion ($anioFabricacion){
        $this->anioFabricacion = $anioFabricacion;
    }

    public function setDescripcion ($descripcion){
        $this->descripcion = $descripcion;
    }

    public function setPorcentajeAnual ($porcentajeAnual){
        $this->porcentajeAnual = $porcentajeAnual;
    }

    public function setMotoActiva ($motoActiva){
        $this->motoActiva = $motoActiva;
    }

    //metodos

    public function darPrecioVenta(){
        $venta = 0;
        $compraMoto = $this->getCosto();
        $anioactual = date('Y'); //obtiene el anio actual del sistema en el que se ejecuta el codigo
        $aniosTranscurridos = $anioactual - $this->getAnioFabricacion();
        if ($this->getMotoActiva()) {
            $porcentaje = ($this->getPorcentajeAnual() / 100);
            $venta = $compraMoto + $compraMoto * ($aniosTranscurridos * $porcentaje);
        }
        return $venta;
    }

    public function __toString (){
        if (!$this->getMotoActiva()) {
            $activa = "No esta a la venta";
        } else {
            $activa = "Esta disponible";
        }
        return "Codigo de la moto: " .$this->getCodigo().
        "\nCosto: " .$this->getCosto(). 
        "\nAnio de fabricacion: " .$this->getAnioFabricacion().
        "\nDescripcion: " .$this->getDescripcion(). 
        "\nPorcentaje anual: " .$this->getPorcentajeAnual().
        "\nLa moto " .$activa;
    }
}
