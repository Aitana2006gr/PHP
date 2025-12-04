<?php 
require_once "Medico.class";
//Medico de Familia
class MedicoFamilia extends Medico {
    private $num_pacientes;

    public function __construct($nombre, $edad, $turno, $num_pacientes) {
        parent::__construct($nombre, $edad, $turno);
        $this->num_pacientes = $num_pacientes;
    }

    public function getNumPacientes() {
        return $this->num_pacientes;
    }

    public function mostrarDatos() {
        echo "Médico de Familia: {$this->nombre}, Edad: {$this->edad}, Turno: {$this->turno}, Nº Pacientes: {$this->num_pacientes}<br>";
    }
}
?>