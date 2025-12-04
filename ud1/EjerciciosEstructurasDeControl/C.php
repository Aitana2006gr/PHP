<!DOCTYPE html>
<html>

<head>
    <title>Ejercicios Estructuras de control</title>
</head>

<body>
    <h3>Actividad 3.1</h3>
    <h4>Ejercicio c</h4>

    <?php
    /*Realiza en PHP un programa que muestre los números comprendidos entre 100 y 999
    que son capicúa*/
    echo "Números capicúa:<br>";
    for($i=100;$i<=999;$i++){
        if(esCapicua($i)==true){
            echo $i.", ";
        }
        
    }

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
    ?>
</body>
</html>