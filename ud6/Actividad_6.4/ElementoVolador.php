<?php
require_once "Volador.php";

abstract class ElementoVolador implements Volador {

    //Atributos protegidos
    protected $nombre;
    protected $numAlas;
    protected $numMotores;
    protected $altitud;
    protected $velocidad;

    //Constructor
    public function __construct($nombre, $numAlas, $numMotores){
        $this->nombre = $nombre;
        $this->numAlas = $numAlas;
        $this->numMotores = $numMotores;
        $this->altitud = 0;
        $this->velocidad = 0;
    }

    //Getters y setters
    public function getNombre(){ return $this->nombre; }
    public function getNumAlas(){ return $this->numAlas; }
    public function getNumMotores(){ return $this->numMotores; }
    public function getAltitud(){ return $this->altitud; }
    public function getVelocidad(){ return $this->velocidad; }

    public function setAltitud($altitud){ $this->altitud = $altitud; }
    public function setVelocidad($velocidad){ $this->velocidad = $velocidad; }

    //Método Volando
    public function volando(){
        return $this->altitud > 0;
    }

    //Método Acelerar
    public function acelerar($velocidad){
        $this->velocidad = $velocidad;
        echo "Acelerando a ".$velocidad."<br>";
    }

    //Métodos Abstractos
    abstract public function volar($altitud);
    abstract public function mostrarInformacion();
}
?>
