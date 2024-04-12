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

    public function retornarMoto($codigoMoto){
        $motoEncontrada = null; // null pq todavia no se encuentra la moto
        $cont = 0;
        $motos= $this->getColeccionMotos();
        $cantMotos = count($motos);

        while ($cont < $cantMotos && $motoEncontrada === null) {
            $moto = $this->getColeccionMotos()[$cont];
            if ($moto->getCodigo () == $codigoMoto) {
                $motoEncontrada = $moto;
            }
            $cont++;
        }
        return $motoEncontrada;
    }

    public function registrarVenta($colCodigosMoto, $objCliente){
        $objVenta = new Venta(6, date('Y'),$objCliente, [], 0);  

        foreach ($colCodigosMoto as $codigoMoto) {
            $objMotoCod = $this->retornarMoto($codigoMoto);
            if ($objMotoCod !== null && $objMotoCod->getMotoActiva() && $objCliente->getEstado()) {
                $objVenta->incorporarMoto($objMotoCod);
            }
        }

        //se modifica el arreglo coleccionVentas
        $coleVentas = $this->getColeccionVentas();
        array_push($coleVentas,$objVenta);
        $this->setColeccionVentas($coleVentas);

        return $objVenta->getPrecioFinal();
    }

    public function retornarVentasXCliente($tipo,$numDoc){
        $ventasCliente = []; //arreglo para almacenar las ventas del cliente
        $ventas = $this->getColeccionVentas();
        foreach ($ventas as $venta) {
            $clienteVenta = $venta->getObjCliente();
            if ($clienteVenta->getTipoDoc() === $tipo &&  $clienteVenta->getNumDocumento() === $numDoc ) {
                //Si el cliente tiene todos esos datos buscados almacenamos la venta.
                $ventasCliente[] = $venta;
            }
        }
        return $ventasCliente;
    }

    public function listadoClientes (){
        $clientes = $this->getColeccionClientes();
        $cant = count($clientes);
        $result = "";

        for ($i = 0; $i < $cant; $i++) {
            $clienteActual = $clientes[$i];
            $result .= $clienteActual . "\n";
        }
        return $result;
    }

    public function listadoMotos (){
        $motos = $this->getColeccionMotos();
        $result = "";
        $cant = count($motos);

        for ($i = 0; $i < $cant; $i++) {
            $motoActual = $motos[$i];
            $result .= $motoActual . "\n";
        }
        return $result;
    }

    public function listadoVentas (){
        $ventas = $this->getColeccionVentas();
        $cant = count($ventas);
        $result = "";
        
        for ($i = 0; $i < $cant; $i++) {
            foreach ($ventas[$i] as $venta) {
                $result .= $venta . "\n";
            }
        }
        return $result;
    }

    public function listadoVentasCliente($cliente)
    {
        $ventasCliente = $this->retornarVentasXCliente($cliente->getTipoDoc(), $cliente->getNumDocumento()); // obtengo los datos acá invocando al metodo retornar. No puedo usar los get fuera de la clase entonces hago la funcion aca. Concateno
        $result = null;

        if ($ventasCliente != null) {
            $result = "";
            foreach ($ventasCliente as $venta) {
                $result .= $venta . "\n";
            }
        }
        return $result;
    }

    public function __toString(){

        return "Denominacion del auto: " .$this->getDenominacionDelAuto(). 
        "\nDireccion: " .$this->getDireccionEmpresa() .
        "\nLista de clientes: " .$this->listadoClientes().
        "\nLista de motos: " .$this->listadoMotos().
        "\nLista de ventas: " .$this->listadoVentas();
    }
}