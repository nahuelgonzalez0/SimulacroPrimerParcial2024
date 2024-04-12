<?php
class Empresa {
    private $denominacionDelAuto;
    private $direccionEmpresa;
    private $coleccionClientes; //arreglo
    private $coleccionMotos; //arreglo
    private $coleccionVentas; //arreglo

    //metodo constructor
    
    public function __construct($denominacionDelAuto,$direccionEmpresa,$coleccionClientes,$coleccionMotos,$coleccionVentas){
        $this->denominacionDelAuto = $denominacionDelAuto;
        $this->direccionEmpresa = $direccionEmpresa;
        $this->coleccionClientes = $coleccionClientes;
        $this->coleccionMotos = $coleccionMotos;
        $this->coleccionVentas = $coleccionVentas;
    }

    //metodos de acceso

    public function getDenominacionDelAuto (){
        return $this->denominacionDelAuto;
    }

    public function getDireccionEmpresa (){
        return $this->direccionEmpresa;
    }

    public function getColeccionClientes (){
        return $this->coleccionClientes;
    }

    public function getColeccionMotos (){
        return $this->coleccionMotos;
    }

    public function getColeccionVentas (){
        return $this->coleccionVentas;
    }

    //metodos de modificacion

    public function setDenominacionDelAuto ($denominacionDelAuto){
        $this->denominacionDelAuto = $denominacionDelAuto;
    }

    public function setDireccionEmpresa ($direccionEmpresa){
        $this->direccionEmpresa = $direccionEmpresa;
    }

    public function setColeccionClientes ($coleccionClientes){
        $this->coleccionClientes = $coleccionClientes;
    }

    public function setColeccionMotos ($coleccionMotos){
        $this->coleccionMotos = $coleccionMotos;
    }

    public function setColeccionVentas ($coleccionVentas){
        $this->coleccionVentas = $coleccionVentas;
    }

    //metodos

    public function imprimirColeccion ($coleccion){
        $result = "";
        foreach ($coleccion as $coleccionActual) {
           $result .= $coleccionActual . "\n";
        }
        return $result;
    }

    public function verificarCole ($coleccion){
        if ($coleccion = "") {
            $coleccion = "Esta coleccion esta vacia.";
        }
    }

    //retorna el obj moto cuyo codigo coincide con el recibido
    public function retornarMoto($codigoMoto){
        $motoEncontrada = null; // null pq todavia no se encuentra la moto
        $cont = 0;
        $motos= $this->getColeccionMotos();
        $cantMotos = count($motos);

        while ($motoEncontrada === null && $cantMotos>$cont) {
            if ($motos[$cont]->getCodigo() === $codigoMoto) {
                $motoEncontrada = $motos[$cont];
            }
            $cont++;
        }
        return $motoEncontrada;
    }
    
    public function registrarVenta($colCodigosMoto, $objCliente){
        $coleccionVentas = $this->getColeccionVentas();
        $importeFinal = 0;
        $fechaActual = date('Y-m-d');

        if (!$objCliente->getEstado()) {
            foreach ($colCodigosMoto as $codigoActual) {
                $moto = $this->retornarMoto($codigoActual);

                if ($moto !== null && $moto->getMotoActiva()) {
                    
                    //crea una nueva instancia de Venta con la informacion necesaria
                    $numeroVenta = count($this->getColeccionVentas())+ 1;
                    $venta = new Venta ($numeroVenta, $fechaActual,$objCliente, [$moto], 0);
                    // Suma el costo de la moto al precio final de la venta
                    $precioVentaMoto =  $moto->darPrecioVenta();
                    $importeFinal += $precioVentaMoto;
                    //incorporo la moto a la venta
                    $venta->incorporarMoto($moto);

                    //incorporo la nueva venta a la coleccion de ventas
                    $coleccionVentas[] = $venta;
                    $this->setColeccionVentas($coleccionVentas);
                }
            }
        }
        return $importeFinal;
    }

    public function retornarVentasXCliente($tipo,$numDoc){
        $ventasCliente = []; //arreglo para almacenar las ventas del cliente
        $ventas = $this->getColeccionVentas();
        foreach ($ventas as $venta) {
            $clienteVenta = $venta->getObjCliente();
            if ( $clienteVenta->getTipoDoc() === $tipo &&  $clienteVenta->getNumDocumento() === $numDoc ) {
                //el cliente coincide con lo buscado
                $ventasCliente[] = $venta; //se almacena la venta en el arreglo
            }
        }
        return $ventasCliente;
    }

    public function __toString(){
        $coleClientes = $this->imprimirColeccion($this->getColeccionClientes());
        $coleClientes = $this->verificarCole($coleClientes);

        $coleMotos = $this->imprimirColeccion($this->getColeccionMotos());
        $coleMotos = $this->verificarCole($coleMotos);

        $coleVentas = $this->imprimirColeccion($this->getColeccionVentas());
        $coleVentas = $this->verificarCole($coleVentas);

        echo "Denominacion del auto: " .$this->getDenominacionEmpresa(). 
        "\nDireccion: " .$this->getDireccionEmpresa() .
        "\nClientes: " .$coleClientes.
        "\nMotos: " .$coleMotos.
        "\nVentas: " .$coleVentas;
    }
}