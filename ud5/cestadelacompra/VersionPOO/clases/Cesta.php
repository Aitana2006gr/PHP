<?php
require_once __DIR__ . '/Producto.php';
//Con el __DIR__ me aseguro que la clase producto este disponible

class Cesta {
    private $productos = []; //Array de objetos Producto

    public function __construct() {
        //Carga desde sesión
        $this->cargar_cesta();
    }

    //Añade un Producto a la cesta y guarda en sesión
    public function anadirProducto(Producto $producto){
        $this->productos[] = $producto;
        $this->guardar_cesta();
    }

    //Vaciar cesta
    public function vaciar(){
        $this->productos = [];
        $this->guardar_cesta();
    }

    //Calcular total
    public function calcularTotal(){
        $total = 0.0;
        foreach ($this->productos as $p) {
            $total += $p->getPrecio();
        }
        return $total;
    }

    //Devuelve el array de productos (objetos)
    public function getProductos() {
        return $this->productos;
    }

    //MostrarHtml devuelve el html para mostrar
    public function mostrarHtml() {
        if (empty($this->productos)) {
            return "<p style='text-align:center;'>Cesta vacía</p>";
        }
        $html = "<ul>";
        foreach ($this->productos as $p) {
            $html .= "<li>" . htmlspecialchars($p->getNombre()) . " (" . number_format($p->getPrecio(), 2, ',', '.') . " €)</li>";
        }
        $html .= "</ul>";
        $html .= "<p style='text-align:center;'>Total: " . number_format($this->calcularTotal(), 2, ',', '.') . " €</p>";
        return $html;
    }

    //cargar_cesta lee la $_SESSION['cesta'] y coloca los objetos Producto
    public function cargar_cesta(){
        if (!isset($_SESSION)) session_start();
        $this->productos = [];

        if (isset($_SESSION['cesta']) && is_array($_SESSION['cesta'])) {
            foreach ($_SESSION['cesta'] as $producto) {
                if (is_array($producto) && isset($producto['codigo'], $producto['nombre'], $producto['precio'])) {
                    //Desde el array vuelvo a reconstruir el producto
                    $this->productos[] = new Producto($producto['codigo'], $producto['nombre'], floatval($producto['precio']));
                } elseif (is_object($producto) && $producto instanceof Producto) {
                    $this->productos[] = $producto;
                }
            }
        }
    }

    //guardar_cesta guarda la sesión 
    public function guardar_cesta(){
        if (!isset($_SESSION)) session_start();
        //Guardamos como arrays 
        //De esta forma hago que el resto del código que consulte $_SESSION['cesta'] como arrays siga funcionando)
        $arrayGuardar = [];
        foreach ($this->productos as $p) {
            $arrayGuardar[] = [
                'codigo' => $p->getCod(),
                'nombre' => $p->getNombre(),
                'precio' => $p->getPrecio()
            ];
        }
        $_SESSION['cesta'] = $arrayGuardar;
    }
}
