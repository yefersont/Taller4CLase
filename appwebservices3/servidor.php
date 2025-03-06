<?php

class Servidor {

    private $num1;
    private $num2;
    private $resultado;

    public function __construct() {

    }

    public function Sumar($num1 = null, $num2 = null) {

        if (!is_numeric($num1) || !is_numeric($num2)) {
            return "Error: Los parámetros deben ser numéricos.";
        }

        $num1 = intval($num1);
        $num2 = intval($num2);

        $resultado = $num1 + $num2;
        return "El resultado de la suma de $num1 + $num2 es: $resultado";
    }
}

?>