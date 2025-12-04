<?php
require_once "Empleado.php";

class Encargado extends Empleado {
    public function __construct($nombre, $sueldo)
    {
        return parent::__construct($nombre, $sueldo);
    }
    //Reciben un 15% más de suelo base que un empleado nombral
    public function getSueldo(){
        $sueldoBase = parent::getSueldo();
        return $sueldoBase * 1.15;
    }
}
