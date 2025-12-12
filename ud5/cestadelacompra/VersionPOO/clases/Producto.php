<?php
class Producto
{   //Atributos
    private $cod;
    private $nombre;
    private $precio;

    //Constructor
    public function __construct($cod, $nombre, $precio)
    {
        $this->cod = $cod;
        $this->nombre = $nombre;
        $this->precio = $precio;
    }

    //Getters
    public function getCod()
    {
        return $this->cod;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    //Método toString
    public function __toString()
    {
        return $this->cod . " - " . $this->nombre . " - " . number_format($this->precio, 2, ',', '.') . " €";
    }

    //Retorna un array
    public function toArray()
    {
        $array = [
            'codigo' => $this->cod,
            'nombre' => $this->nombre,
            'precio' => $this->precio
        ];
        return $array;
    }
}
