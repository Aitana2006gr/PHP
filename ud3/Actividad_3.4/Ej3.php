<?php
echo "<h2>Ejercicio 3: Gestión de Inventario (Array Asociativo)</h2>";
$inventario = [
    "Laptop" => ["precio" => 899.99, "stock" => 15, "categoria" => "Electrónica"],
    "Ratón" => ["precio" => 12.50, "stock" => 50, "categoria" => "Accesorios"],
    "Teclado" => ["precio" => 45.90, "stock" => 30, "categoria" => "Accesorios"],
    "Monitor" => ["precio" => 250.99, "stock" => 20, "categoria" => "Electrónica"],
    "Auriculares" => ["precio" => 59.99, "stock" => 25, "categoria" => "Electrónica"]
];

function productosSuperior20($array)
{
    foreach ($array as $elemento => $datos) {
        if ($datos["precio"] > 20) {
            echo "- $elemento: " . number_format($datos["precio"], 2) . " (Stock: {$datos["stock"]})<br>";
        }
    }
};

function valorInventario($array)
{
    $total = 0;
    foreach ($array as $datos) {
        $total += $datos["precio"] * $datos["stock"];
    }
    echo number_format($total,2);
}

function aumentar10Stock($array){
    foreach($array as $elemento =>$datos){
        $datos["stock"]+=10;
        echo "-$elemento: {$datos['stock']} unidades <br>";
    }
}

echo "Productos con precio superior a 20€<br>";
productosSuperior20($inventario);
echo "<br>Calcular el valor total del inventario (precio x stock de cada producto):<br>";
echo "El valor total del inventario es: ".valorInventario($inventario)."€<br>";
echo "<br>Aumentar el stock de todos los productos en 10 unidades:<br>";
aumentar10Stock($inventario);

