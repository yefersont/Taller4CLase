<?php

require_once "vendor/autoload.php";
require_once "vendor/econea/nusoap/src/nusoap.php";

class ClienteSOAP {

    private $cliente;
    private $urlWsdl = "http://localhost/webservices/appwebservices3/invocar.php?wsdl";

    public function __construct() {
        $this->cliente = new nusoap_client($this->urlWsdl, true);

        // Verificar si hay errores en la inicialización del cliente
        $error = $this->cliente->getError();
        if ($error) {
            throw new Exception("Error en el constructor: " . $error);
        }
    }

    public function sumar($num1, $num2) {
        // Invocar la función sumar
        $result = $this->cliente->call("Servidor.Sumar", array("num1" => $num1, "num2" => $num2));

        // Validar la respuesta del servicio
        if ($this->cliente->fault) {
            return ["error" => "Fault", "detalle" => $result];
        } else {
            $error = $this->cliente->getError();
            if ($error) {
                return ["error" => "Error", "detalle" => $error];
            } else {
                return ["resultado" => $result];
            }
        }
    }
}

// Uso del cliente
try {
    $clienteSOAP = new ClienteSOAP();
    $respuesta = $clienteSOAP->sumar(10, 5);

    echo "<h2>Respuesta</h2><pre>";
    print_r($respuesta);
    echo "</pre>";

} catch (Exception $e) {
    echo "<h2>Excepción</h2><pre>" . $e->getMessage() . "</pre>";
}

?>