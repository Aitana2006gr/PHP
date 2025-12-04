<?php
echo "<h2>Ejercicio 4: Fusionar arrays sin duplicados</h2>";
$array1 = [1, 2, 3, 4];
$array2 = [3, 4, 5, 6];
$array3 = [5, 6, 7, 8];

echo "Arrays originales:<br>";
print_r($array1);
echo "<br>";
print_r($array2);
echo "<br>";
print_r($array3);
echo "<br>";

function fusionarSinDuplicados(...$arrays) { // Usamos ... para aceptar múltiples arrays, asi se sabe que son varios argumentos los que se pasan
    $resultado = [];
    foreach ($arrays as $array) {
        foreach ($array as $elemento) {
            if (!in_array($elemento, $resultado)) { // in_array comprueba si un elemento ya está en el array
                $resultado[] = $elemento; // si no está, lo añadimos
            }
        }
    }
    return $resultado;
}
/*function fusionarSinDuplicados(...$arrays) { // Usamos ... para aceptar múltiples arrays, asi se sabe que son varios argumentos los que se pasan
    $resultado = [];
    foreach ($arrays as $array) { //se puede sustituir recorriendo el aray i=0; i<count($arrays); i++
        foreach ($array as $elemento) { //también $arrays[$i] as $elemento
            if (!in_array($elemento, $resultado)) { // in_array comprueba si un elemento ya está en el array
                $resultado[] = $elemento; // si no está, lo añadimos
            }
        }
    }
    return $resultado;
}*/

$resultado4 = fusionarSinDuplicados($array1, $array2, $array3);
echo "<br>Resultado: <br>";
print_r($resultado4);
?>