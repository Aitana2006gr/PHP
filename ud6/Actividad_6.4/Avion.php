<?php
require_once "Producto.php";

class Avion extends ElementoVolador implements Volador
{
    private $companiaAerea;
    private $fechaAlta;
    private $altitudMaxima;

    public function __construct($companiaAerea, $fechaAlta, $altitudMaxima) {}
    public function volar(float $altitud): void
    {
        throw new \Exception('Not implemented');
    }
    public function mostrarInformacion(): void
    {
        throw new \Exception('Not implemented');
    }
}
