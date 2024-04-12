<?php
class Cliente {
    private $nombre;
    private $apellido;
    private $estado; //BOOLEAN
    private $tipoDoc; 
    private $numDocumento;

    //metodo constructor
    public function __construct($nombre,$apellido,$estado,$tipoDoc,$numDocumento){
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->estado = $estado;
        $this->tipoDoc = $tipoDoc;
        $this->numDocumento = $numDocumento;
    }

    //metodo de acceso
    public function getNombre (){
        return $this->nombre;
    }

    public function getApellido (){
        return $this->apellido;
    }

    public function getEstado (){
        return $this->estado;
    }

    public function getTipoDoc (){
        return $this->tipoDoc;
    }

    public function getNumDocumento (){
        return $this->numDocumento;
    }

    //metodo de modificacion

    public function setNombre ($nombre){
        $this->nombre = $nombre;
    }

    public function setApellido ($apellido){
        $this->apellido = $apellido;
    }

    public function setEstado ($estado){
        $this->estado = $estado;
    }

    public function setTipoDoc ($ttipoDocipo){
        $this->tipoDoc = $tipoDoc;
    }

    public function setNumDocumento ($numDocumento){
        $this->numDocumento = $numDocumento;
    }

    //metodos
    public function __toString (){
        $estado = "";
        if ($this->getEstado()) {
            $estado = "activo";
        } else {
            $estado = "dado de vaja";
        }
        return "Nombre:" .$this->getNombre(). 
        "\nApellido:" .$this->getApellido(). 
        "\nEstado: " .$estado.
        "\nTipo de documento: ".$this->getTipoDoc(). 
        "\nNumero de documento: ".$this->getNumDocumento();

    }
}
