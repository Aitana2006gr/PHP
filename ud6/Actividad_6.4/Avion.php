<?php
require_once "ElementoVolador.php";

class Avion extends ElementoVolador {

    //Atributos privados
    private $companiaAerea;
    private $fechaAlta;
    private $altitudMaxima;

    //Constructor
    public function __construct($nombre, $numAlas, $numMotores, $companiaAerea, $fechaAlta, $altitudMaxima){
        parent::__construct($nombre, $numAlas, $numMotores);
        $this->companiaAerea = $companiaAerea;
        $this->fechaAlta = $fechaAlta;
        $this->altitudMaxima = $altitudMaxima;
    }

    //Getters y setters
    public function getCompania(){ return $this->companiaAerea; }
    public function getFechaAlta(){ return $this->fechaAlta; }
    public function getAltitudMaxima(){ return $this->altitudMaxima; }

    //Método volar
    public function volar($altitud){
        echo "IntentandoVolarA ".$altitud."<br>";

        if($altitud < 0 || $altitud > $this->altitudMaxima){
            echo "Error: La altitud es menor a 0 <br>";
            return;
        }

        if($this->getVelocidad() < 150){
            echo "Error: La velocidad no es suficiente para volar<br>";
            return;
        }

        $actual = $this->getAltitud();

        while($actual < $altitud){
            $actual += 100;
            if($actual > $altitud) $actual = $altitud;
            $this->setAltitud($actual);
            echo "Subiendo de altitud a".$actual."m <br>";
        }
    }

    //Método mostrarInformacion
    public function mostrarInformacion(){
        echo "<br><strong>Avión:</strong><br>";
        echo "Nombre: ".$this->getNombre()."<br>";
        echo "Compañía: ".$this->companiaAerea."<br>";
        echo "Fecha alta: ".$this->fechaAlta."<br>";
        echo "Altitud máxima: ".$this->altitudMaxima."<br>";
        echo "Altitud actual: ".$this->getAltitud()."<br>";
        echo "Velocidad: ".$this->getVelocidad()."<br><br>";
    }
}
?>

