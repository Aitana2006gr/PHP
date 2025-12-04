<?php
require_once "Volador.php";

// Clase abstracta que implementa la interfaz Volador
abstract class ElementoVolador implements Volador
{

    //Atributos privados
    protected string $nombre;
    protected int $numAlas;
    protected int $numMotores;
    protected int $altitud;
    protected int $velocidad;

    //Constructor
    public function __construct(string $nombre, int $numAlas, int $numMotores)
    {
        $this->nombre = $nombre;
        $this->numAlas = $numAlas;
        $this->numMotores = $numMotores;
        $this->altitud = 0;
        $this->velocidad = 0;
    }

    //Métodos get
    public function getNombre(): string
    {
        return $this->nombre;
    }
    public function getNumAlas(): int
    {
        return $this->numAlas;
    }
    public function getNumMotores(): int
    {
        return $this->numMotores;
    }
    public function getAltitud(): int
    {
        return $this->altitud;
    }
    public function getVelocidad(): int
    {
        return $this->velocidad;
    }

    //Métodos set
    public function setAltitud(int $altitud)
    {
        $this->altitud = $altitud;
    }
    public function setVelocidad(int $velocidad)
    {
        $this->velocidad = $velocidad;
    }

    //Método volando() que comprueba si esta volando
    public function volando(): bool
    {
        return $this->altitud > 0;
    }

    //Método acelerar() que actualiza la velocidad (parecido a un set)
    public function acelerar($velocidad)
    {
        $this->velocidad = $velocidad;
        echo "Acelerando a $velocidad km/h<br>";
    }

    //Métodos abstractos
    abstract public function volar($altitudObjetivo);
    abstract public function mostrarInformacion();
}
