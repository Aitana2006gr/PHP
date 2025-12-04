<?php
echo "<h2>Ejercicio 2: Agrupar por categoría</h2>";
$productos = [
    ['nombre' => 'Manzana', 'precio' => 1.5, 'categoria' => 'Frutas'],
    ['nombre' => 'Lechuga', 'precio' => 0.8, 'categoria' => 'Verduras'],
    ['nombre' => 'Pera', 'precio' => 1.2, 'categoria' => 'Frutas'],
    ['nombre' => 'Tomate', 'precio' => 1, 'categoria' => 'Verduras']
];
//Array primera posicion dimensional posicion productos
//Array producto asociativo, clave-valor
echo "Productos originales:";
print_r($productos);
echo "<br><br>";

function agruparPorCategoria($array) {
    $resultado = [];
    foreach ($array as $elemento) {
        $resultado[$elemento['categoria']][] = $elemento;
    }
    return $resultado;
}
function agruparPorCategoria2($productos) {
    $agrupado=[];
    foreach ($productos as $producto){
        $categoria=$producto['categoria'];
        if (!isset($agrupado[$categoria])){
            $agrupado[$categoria]=[];
        }
        $agrupado[$categoria][]=$producto;
    }
    return $agrupado;
}

$resultado2 = agruparPorCategoria2($productos);
echo "Resultado agrupado:";
print_r($resultado2);
?>
