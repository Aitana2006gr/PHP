<?php
echo "<h2>Ejercicio 2: Carrito de Compras (Array Asociativo)</h2>";
$carrito = ["Manzanas" => 3, "Pan" => 2, "Leche" => 1, "Huevos" => 12];
$carritoModificado = $carrito;

echo "Carrito inicial:<br>";
foreach ($carrito as $producto => $cantidad) {
    echo "-$producto: $cantidad<br>";
}

echo "<br>**Total de artículos en el carrito: " . total($carrito) . "**<br>";

echo "<br><br>Carrito modificado:<br>";
$carritoModificado["Queso"] = 2;
unset($carritoModificado["Pan"]);
$carritoModificado["Manzanas"] += 2;
foreach ($carritoModificado as $producto => $cantidad) {
    echo "-$producto: $cantidad<br>";
}
function total($array){
    $total = 0;
    //foreach ($array as $producto => $cantidad) { 
    //Cuando uso foreach, php solo recorre los valores del array, ignorando las claves
    //Si hago $array as $clave => $valor, recorre ambos clave y valor
    foreach ($array as $cantidad) {
        $total += $cantidad;
    }
    return $total;
}

echo "<br>**Total de artículos en el carrito: " . total($carritoModificado) . "**";
