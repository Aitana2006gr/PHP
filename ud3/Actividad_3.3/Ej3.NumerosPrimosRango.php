<?php
echo "<h2>Ejercicio 3: Números primos en rango </h2>";

$inicio = 10;
$fin = 30;
echo "Rango: $inicio - $fin";

function esPrimo($num)
{
    if ($num < 2) {
        return false;
    } // numeros menores que 2 no son primos
    // Recorremos desde 2 hasta num-1
    for ($i = 2; $i < $num; $i++) {
        if ($num % $i == 0) {
            return false; // si lo divide exacto, no es primo
        }
    }

    return true; // si nadie lo dividió, es primo
}

function primoEnRango($inicio, $fin)
{
    $resultado = [];
    for ($i = $inicio; $i <= $fin; $i++) {
        if (esPrimo($i)) {
            $resultado[] = $i;
        }
    }
    return $resultado;
}

$resultado3 = primoEnRango($inicio, $fin);
echo "<br>Resultado: ";
print_r($resultado3);
