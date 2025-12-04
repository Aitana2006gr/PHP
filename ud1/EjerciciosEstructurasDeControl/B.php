<!DOCTYPE html>
<html>

<head>
    <title>Ejercicios Estructuras de control</title>
</head>

<body>
    <h3>Actividad 3.1</h3>
    <h4>Ejercicio b</h4>

    <?php
    /*Realiza un programa que indique si un número de 3 cifras es capicúa. Intenta hacerlo
para cualquier número de cifras.*/

function esCapicua($numero) {
    // Convertir el número a una cadena
    $cadenaNumero = (string)$numero;
    
    // Invertir la cadena
    $cadenaInvertida = strrev($cadenaNumero);
    
    // Comparar la cadena original con la invertida
    if ($cadenaNumero === $cadenaInvertida) {
        return true; // Es capicúa
    } else {
        return false; // No es capicúa
    }
}

// Ejemplo para un número de 3 cifras
$a = 737;
if (esCapicua($a)) {
    echo "$a es un número capicúa<br>"; // si es verdadero
} else {
    echo "$a no es un número capicúa"; // si es falso
}

$b = 62226; //numero de 5 cifras
if (esCapicua($b)) {
    echo "$b es un número capicúa<br>";
} else {
    echo "$b no es un número capicúa";
}

?>
</body>
</html>