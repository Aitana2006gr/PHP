<?php
require_once "ElementoVolador.php";

class Helicoptero extends ElementoVolador {

    //Atributos
    private $propietario;
    private $nRotor;

    //Constructor
    public function __construct($nombre, $numAlas, $numMotores, $propietario, $nRotor){
        parent::__construct($nombre, $numAlas, $numMotores);
        $this->propietario = $propietario;
        $this->nRotor = $nRotor;
    }

    //Getters y setters
    public function getPropietario(){ return $this->propietario; }
    public function getNRotor(){ return $this->nRotor; }

    //Método volar
    public function volar($altitud){
        echo "Intentando volar a".$altitud."m <br>";

        $maxAltitud = 100 * $this->nRotor;
        if($altitud > $maxAltitud){
            echo "Error: La altitud supera el limite de la permitida<br>";
            return;
        }

        $actual = $this->getAltitud();

        while($actual < $altitud){
            $actual += 20;
            if($actual > $altitud) $actual = $altitud;
            $this->setAltitud($actual);
            echo "Subiendo de altitud a: ".$actual."m<br>";
        }
    }

    //Método mostrarInformacion
    public function mostrarInformacion(){
        echo "<br><strong>Helicoptero:</strong><br>";
        echo "Nombre: ".$this->getNombre()."<br>";
        echo "Propietario: ".$this->propietario."<br>";
        echo "Número de rotores: ".$this->nRotor."<br>";
        echo "Altitud actual: ".$this->getAltitud()."<br>";
        echo "Velocidad: ".$this->getVelocidad()."<br><br>";
    }
}
?>
