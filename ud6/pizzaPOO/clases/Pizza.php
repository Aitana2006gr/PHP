<?php
class Pizza
{
    private $codigo;
    private $descripcion;
    private $precio;
    private $tipo;

    function __construct($codigo, $descripcion, $precio, $tipo)
    {
        $this->codigo = $codigo;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->tipo = $tipo;
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
}
?>