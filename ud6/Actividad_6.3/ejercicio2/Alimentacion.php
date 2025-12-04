<?php
require_once "Producto.php";

class Alimentacion extends Producto
{
    private $mesCaducidad;
    private $anioCaducidad;

    public function __construct($codigo, $nombre, $precio, $mesCaducidad, $anioCaducidad)
    {
        parent::__construct($codigo, $nombre, $precio);
        $this->mesCaducidad = $mesCaducidad;
        $this->anioCaducidad = $anioCaducidad;
    }

    //Getters
    public function getMesCaducidad() {
        return $this->mesCaducidad;
    }

    public function getAnioCaducidad() {
        return $this->anioCaducidad;
    }

    //Setters
    public function setMesCaducidad($mes) {
        $this->mesCaducidad = $mes;
    }

    public function setAnioCaducidad($anio) {
        $this->anioCaducidad = $anio;
    }

    public function mostrarDatos()
    {
        echo "<hr><strong>Producto Alimentación:</strong><br>";
        echo "Código: {$this->codigo},<br>"; 
        echo "Nombre: {$this->nombre},<br>";
        echo "Precio: {$this->precio} €,<br>";
        echo "Caducidad: {$this->mesCaducidad}/{$this->anioCaducidad}<br><hr>";
    }
}
