<?php
require_once "ElementoVolador.php";

class Avion extends ElementoVolador
{

    private string $companiaAerea;
    private string $fechaAlta;
    private int $altitudMaxima;

    public function __construct(
        string $nombre,
        int $numAlas,
        int $numMotores,
        string $companiaAerea,
        string $fechaAlta,
        int $altitudMaxima
    ) {
        parent::__construct($nombre, $numAlas, $numMotores);
        $this->companiaAerea = $companiaAerea;
        $this->fechaAlta = $fechaAlta;
        $this->altitudMaxima = $altitudMaxima;
    }

    //Método get
    public function getCompaniaAerea()
    {
        return $this->companiaAerea;
    }

    //Método volar()
    public function volar($altitudObjetivo)
    {

        echo "Intentando volar...<br>";

        //Compruebo límites
        if ($altitudObjetivo < 0 || $altitudObjetivo > $this->altitudMaxima) {
            echo "ERROR: Altitud no válida<br>";
            return;
        }

        //Compruebo la velocidad
        if ($this->getVelocidad() < 150) {
            echo "ERROR: La velocidad no es suficiente para volar<br>";
            return;
        }else{
            echo "Velocidad suficiente. Iniciando ascenso...<br>";
        }

        

        //Ascenso de 100 en 100 m
        while ($this->getAltitud() < $altitudObjetivo) {
            $nueva = $this->getAltitud() + 100;
            if ($nueva > $altitudObjetivo) {
                $nueva = $altitudObjetivo;
            }
            $this->setAltitud($nueva);
            echo "Altitud actual: {$this->getAltitud()}m";
        }

        echo "Altitud objetivo alcanzada<br>";
    }

    public function mostrarInformacion()
    {
        echo "<br><strong>Información del avión:</strong><br>";
        echo "Nombre: {$this->getNombre()}<br>";
        echo "Compañía: {$this->companiaAerea}<br>";
        echo "Fecha alta: {$this->fechaAlta}<br>";
        echo "Motores: {$this->getNumMotores()}<br>";
        echo "Alas: {$this->getNumAlas()}<br>";
        echo "Altitud máxima: {$this->altitudMaxima}<br>";
        echo "Altitud actual: {$this->getAltitud()}<br>";
        echo "Velocidad: {$this->getVelocidad()}<br>";
    }
}
