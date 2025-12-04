<?php
class Empleado
{
    protected $nombre;
    protected $sueldo;

    public function __construct($nombre, $sueldo)
    {
        $this->nombre = $nombre;
        $this->sueldo = $sueldo;
    }
    public function getNombre()
    {
        $this->nombre;
        return $this->nombre;
    }
    public function getSueldo()
    {
        return $this->sueldo;
    }
}

?>