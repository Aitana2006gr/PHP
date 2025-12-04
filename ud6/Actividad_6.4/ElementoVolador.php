<?php
abstract class ElementoVolador implements Volador
{
    protected $nombre;
    protected $numAlas;
    protected $numMotores;
    protected $altitud;
    protected $velocidad;

    public function __construct($nombre, $numAlas, $numMotores)
    {
        $this->nombre = $nombre;
        $this->numAlas = $numAlas;
        $this->numMotores = $numMotores;
        $this->altitud = 0;
        $this->velocidad = 0;
    }

    //Getters
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getNumAlas()
    {
        return $this->numAlas;
    }
    public function getNumMotores()
    {
        return $this->numMotores;
    }
    public function getAltitud()
    {
        return $this->altitud;
    }
    public function getVelocidad()
    {
        return $this->velocidad;
    }

    //Setters
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function setNumAlas($numAlas)
    {
        $this->numAlas = $numAlas;
    }
    public function setNumMotores($numMotores)
    {
        $this->numMotores = $numMotores;
    }
    public function setAltitud($altitud)
    {
        $this->altitud = $altitud;
    }
    public function setVelocidad($velocidad)
    {
        $this->velocidad = $velocidad;
    }

    public function acelerar(float $nuevaVelocidad)
    {
        if ($nuevaVelocidad){
            $this->velocidad = $nuevaVelocidad;
        }
        
    }

    //Metodos de la clase
    public function volando($altitud)
    {
        $ifVolando=false;
        if ($altitud > 0) {
            $ifVolando=true;
        }
        return $ifVolando;
    }
    
    abstract public function volar(float $altitud): void;
    abstract public function mostrarInformacion(): void;
}
