<?php
include_once "ClaseCliente.php";
include_once "ClaseEmpresa.php";
include_once "ClaseFecha.php";
include_once "ClaseMoto.php";
include_once "ClaseVenta.php";
$objCliente1 = new Cliente ("Nahuel", "Gonzalez", true, "DNI", 41392075 );
$objCliente2 = new cliente ("Jazmin", "Psiciottano", false, "DNI", 57869104);

$objMoto1 = new Moto (11, 2230000, 2022, "Benelli Imperiale 400", 85, true);
$objMoto2 = new Moto (12, 584000, 2021, "Zanella Zr 150 Ohc", 70, true);
$objMoto3 = new Moto (13, 999900, 2023, "Zanella Patagonian Eagle 250", 55, false);

$empresa = new Empresa ("Alta Gama", "Av Argenetina 123", [$objCliente1, $objCliente2],[$objMoto1, $objMoto2, $objMoto3], []);

$res = $empresa->registrarVenta( [11,12,13], $objCliente2);
echo $res; 

echo "\n";

$res2 = $empresa->registrarVenta([12], $objCliente2);

echo $res2;

echo "\n";

//Invocar al método registrarVenta($colCodigosMotos, $objCliente) de la Clase Empresa donde el $objCliente es una referencia a la clase Cliente almacenada en la variable $objCliente2 (creada en el punto 1) y la colección de códigos de motos es la siguiente [2]. Visualizar el resultado obtenido

$res3 = $empresa->registrarVenta([2], $objCliente2);

echo $res3;

echo "\n";

//Invocar al método retornarVentasXCliente($tipo,$numDoc) donde el tipo y número de documento se corresponden con el tipo y número de documento del $objCliente1.

$res4 = $empresa->retornarVentasXCliente("DNI",41392075);

$res5 = $empresa->retornarVentasXCliente("DNI",57869104);