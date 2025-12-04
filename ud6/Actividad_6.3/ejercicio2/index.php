<?php
require_once "Alimentacion.php";
require_once "Electronica.php";

function mostrarProductos($cesta, &$totalAlimentacion, &$totalElectronica) {
    echo "<h2>Productos en la cesta:</h2>";
    foreach ($cesta as $producto) {
        $producto->mostrarDatos();
        if ($producto instanceof Alimentacion) {
            $totalAlimentacion += $producto->getPrecio();
        } elseif ($producto instanceof Electronica) {
            $totalElectronica += $producto->getPrecio();
        }
    }
}

//Creo la cesta de la compra
$cesta = [];

//3 productos de alimentación
$cesta[] = new Alimentacion(101, "Leche", 1.5, 12, 2025);
$cesta[] = new Alimentacion(102, "Pan", 0.8, 12, 2024);
$cesta[] = new Alimentacion(103, "Sandía", 2.3, 10, 2025);

//3 productos de electrónica
$cesta[] = new Electronica(201, "Televisor", 350, 24);
$cesta[] = new Electronica(202, "Teclado Gaming", 120, 12);
$cesta[] = new Electronica(203, "Auriculares", 73, 6);

//Inicializo las variables
$totalAlimentacion = 0;
$totalElectronica = 0;

//Muestro los productos
mostrarProductos($cesta, $totalAlimentacion, $totalElectronica);

//Calculo el total
$total = $totalAlimentacion + $totalElectronica;

echo "Total de la compra: $total €<br>";
echo "Gasto más alto en: " . ($totalAlimentacion > $totalElectronica ? "Alimentación" : "Electrónica");
