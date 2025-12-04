<?php
//Medico.php
abstract class Medico {
    protected $nombre;
    protected $edad;
    protected $turno; //mañana o tarde

    public function __construct($nombre, $edad, $turno) {
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->turno = $turno;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getEdad() {
        return $this->edad;
    }

    public function getTurno() {
        return $this->turno;
    }

    abstract public function mostrarDatos();
}
?>
