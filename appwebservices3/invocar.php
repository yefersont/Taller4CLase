<?php

require_once "vendor/autoload.php";
require_once "vendor/econea/nusoap/src/nusoap.php";
require_once  "servidor.php";

$namespace = "urn:miserviciowsdl";

$server = new nusoap_server();

$server->configureWSDL("sapoperro");

$server->wsdl->schemaTargetNameSpace = $namespace;

$server->register("Servidor.sumar",

array("num1" => "xsd:integer", "num2" => "xsd:integer"),
array("return" => "xsd:string"),
$namespace,
'Sumar valores...' 

);

$server->service(file_get_contents("php://input"));
exit();