<?php
require_once "Medico.class";
//Medico de Urgencias
class MedicoUrgencias extends Medico {
    private $unidad;

    public function __construct($nombre, $edad, $turno, $unidad) {
        parent::__construct($nombre, $edad, $turno);
        $this->unidad = $unidad;
    }

    public function getUnidad() {
        return $this->unidad;
    }

    public function mostrarDatos() {
        echo "Médico de Urgencias: {$this->nombre}, Edad: {$this->edad}, Turno: {$this->turno}, Unidad: {$this->unidad}<br>";
    }
}
?>