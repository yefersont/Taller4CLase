<?php

require_once "vendor/autoload.php";
require_once "vendor/econea/nusoap/src/nusoap.php";
require_once  "servidor.php";

$namespace = "urn:miserviciowsdl";

$server = new nusoap_server();

$server->configureWSDL("PrimerServicioWeb");

$server->wsdl->schemaTargetNameSpace = $namespace;

$server->register("Servidor.Resta",

array("num1" => "xsd:integer", "num2" => "xsd:integer"),
array("return" => "xsd:string"),
$namespace,
'Restar valores...' 

);

$server->register("Servidor.Sumar",

array("num1" => "xsd:integer", "num2" => "xsd:integer"),
array("return" => "xsd:string"),
$namespace,
'Sumar valores...' 

);


$server->register("Servidor.Multiplicacion",

array("num1" => "xsd:integer", "num2" => "xsd:integer"),
array("return" => "xsd:string"),
$namespace,
'Multiplicar valores...' 

);

$server->register("Servidor.Division",

array("num1" => "xsd:integer", "num2" => "xsd:integer"),
array("return" => "xsd:string"),
$namespace,
'Dividir valores...' 

);




$server->service(file_get_contents("php://input"));
exit();