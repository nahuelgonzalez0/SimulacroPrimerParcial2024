<?php
class Fecha {
    private $dia;
    private $mes;
    private $anio;

    //metodo constructor
    public function __construct($dia,$mes,$anio){
        $this->dia = $dia;
        $this->mes = $mes;
        $this->anio = $anio;
    }

    //metodo de acceso

    public function getDia (){
        return $this->dia;
    }

    public function getMes (){
        return $this->mes;
    }

    public function getAnio (){
    return $this->anio;
    }

    //metodo de modificacion

    public function setDia ($dia){
        $this->dia = $dia;
    }

    public function setMes ($mes){
        $this->mes = $mes;
    }

    public function setAnio ($anio){
        $this->anio = $anio;
    }

    //metodos

    public function __toString(){
        return "Dia: " .$this->getDia(). "\nMes:".$this->getMes(). "\nAnio:".$this->getAnio();
    }
}