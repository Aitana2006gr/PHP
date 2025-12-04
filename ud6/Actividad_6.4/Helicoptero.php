<?php
require_once "ElementoVolador.php";

class Helicoptero extends ElementoVolador
{

    private string $propietario;
    private int $nRotor;

    public function __construct(
        string $nombre,
        int $numAlas,
        int $numMotores,
        string $propietario,
        int $nRotor
    ) {
        parent::__construct($nombre, $numAlas, $numMotores);
        $this->propietario = $propietario;
        $this->nRotor = $nRotor;
    }

    public function getNRotor()
    {
        return $this->nRotor;
    }

    // Método volar()
    public function volar($altitudObjetivo)
    {

        $maxPermitido = $this->nRotor * 100;

        echo "<br>Intentando volar...<br>";

        if ($altitudObjetivo > $maxPermitido) {
            echo "ERROR: No puede superar $maxPermitido metros<br>";
            return;
        } {
            echo "Ascendiendo...<br>";
        }


        while ($this->getAltitud() < $altitudObjetivo) {
            $nueva = $this->getAltitud() + 20;
            if ($nueva > $altitudObjetivo) $nueva = $altitudObjetivo;
            $this->setAltitud($nueva);
            echo "Altitud actual: {$this->getAltitud()}m<br>";
        }

        echo "Altitud objetivo alcanzada.<br>";
    }

    public function mostrarInformacion()
    {
        echo "<br><strong>Información del helicóptero:</strong><br>";
        echo "Nombre: {$this->getNombre()}<br>";
        echo "Propietario: {$this->propietario}<br>";
        echo "Número de rotores: {$this->nRotor}<br>";
        echo "Altitud actual: {$this->getAltitud()}<br>";
        echo "Velocidad: {$this->getVelocidad()}<br>";
    }
}
