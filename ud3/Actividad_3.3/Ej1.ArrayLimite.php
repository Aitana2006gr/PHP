<?php
$arrayNumeros = [5, 12, 8, 3, 15, 20]; 
$limite = 10;

echo "Array original: ";
print_r($arrayNumeros);

echo "<br>El array tiene : " . count($arrayNumeros) . " elementos";

function arrayLimite($arrayNumeros, $limite) { // definimos la funcion con dos parametros
    $nuevoArrayLimite = [];  // array vacio para guardar los numeros menores al limite
    for ($i = 0; $i < count($arrayNumeros); $i++) { // recorremos el array
        if ($arrayNumeros[$i] < $limite) { // usamos [] en vez de () para la posicion del array
            $nuevoArrayLimite[] = $arrayNumeros[$i];
        }
    }
    return $nuevoArrayLimite;
    //foreach($ArrayNumeros as $numero){
    // if ($numero < $limite) { // usamos [] en vez de () para la posicion del array
    //         $nuevoArrayLimite[] = $numero;
    //   }
}

// Guardamos el resultado en una variable
$resultado = arrayLimite($arrayNumeros, $limite);

echo "<br>Resultado : ";
print_r($resultado);
?>
