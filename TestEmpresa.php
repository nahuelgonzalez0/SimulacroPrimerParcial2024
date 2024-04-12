<?php
include_once "ClaseCliente.php";
include_once "ClaseEmpresa.php";
include_once "ClaseMoto.php";
include_once "ClaseVenta.php";
$objCliente1 = new Cliente ("Nahuel", "Gonzalez", false , "DNI", 41392075);
$objCliente2 = new cliente ("Jazmin", "Psiciottano", true, "DNI", 57869104);

$objMoto1 = new Moto (11, 2230000, 2022, "Benelli Imperiale 400", 85, true);
$objMoto2 = new Moto (12, 584000, 2021, "Zanella Zr 150 Ohc", 70, true);
$objMoto3 = new Moto (13, 999900, 2023, "Zanella Patagonian Eagle 250", 55, false);

//punto 4
$empresa = new Empresa ("Alta Gama", "Av Argenetina 123", [$objCliente1, $objCliente2],[$objMoto1, $objMoto2, $objMoto3], []);

$coleccionCodigosMoto = [11, 12, 13];

//punto 5
echo "--------------------------------------------\n";
$registra1 = $empresa->registrarVenta($coleccionCodigosMoto, $objCliente2);
echo "Resultado de la primera venta: " .$registra1 ."\n";

echo "--------------------------------------------\n";

//punto 6
$registra2 = $empresa->registrarVenta([12], $objCliente2);
echo "Resultado de la segunda venta: " .$registra2 ."\n"; 
echo "--------------------------------------------\n";

//punto 7
$registra3 = $empresa->registrarVenta([2], $objCliente2);
echo "Resultado de la tercera venta: ". $registra3 . "\n";
echo "--------------------------------------------\n";

//punto 8
echo "Ventas del cliente 1 :\n";
$ventasCliente1 = $empresa->retornarVentasXCliente('DNI', 57869104);
foreach ($ventasCliente1 as $venta) {
    echo "\n". $venta . "\n";
}

echo "--------------------------------------------\n";

//punto 9
echo "Ventas del cliente 2 :\n";
$ventasClientes2 = $empresa->retornarVentasXCliente("DNI",41392075);
foreach ($ventasClientes2 as $venta) {
    echo "\n". $venta . "\n";
}

echo "--------------------------------------------\n";
echo"\nDatos de la empresa:\n";
//punto 10
echo $empresa;

echo "--------------------------------------------\n";