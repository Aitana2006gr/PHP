<?php
class Pizza
{
    private $codigo;
    private $descripcion;
    private $precio;
    private $tipo;
    private $foto;
    function __construct($codigo, $descripcion, $precio, $tipo, $foto)
    {
        $this->codigo = $codigo;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->tipo = $tipo;
        $this->foto = $foto;
    }
    public function getCodigo()
    {
        return $this->codigo;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function getTipo()
    {
        return $this->tipo;
    }
    
    public function getFoto()
    {
        return $this->foto;
    }
}
