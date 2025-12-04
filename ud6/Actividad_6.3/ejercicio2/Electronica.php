<?php
require_once "Producto.php";

class Electronica extends Producto {
    private $garantia; //garantia en mese

    public function __construct($codigo, $nombre, $precio, $garantia) {
        parent::__construct($codigo, $nombre, $precio);
        $this->garantia = $garantia;
    }

    //Getters
    public function getgarantia() {
        return $this->garantia;
    }

    //Setters
    public function setGarantia($garantia) {
        $this->garantia = $garantia;
    }

    public function mostrarDatos()
    {
        //parent::mostrarDatos();
        echo "<hr><strong>Producto Electrónica:</strong><br>";
        echo "Código: {$this->codigo},<br>"; 
        echo "Nombre: {$this->nombre},<br>";
        echo "Precio: {$this->precio} €,<br>";
        echo "Plazo de garantía: {$this->garantia}<br><hr>";
    
    }
}
?>
