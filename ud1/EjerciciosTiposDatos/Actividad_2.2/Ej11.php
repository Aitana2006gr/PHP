<!DOCTYPE html>
<html>

<head>
    <title>Ejercicios Tipos de Datos</title>
</head>

<body>
    <h2>Tipos de Datos. Actividad 2.1</h2>
    <h3>Ejercicio 11</h3>

    <?php
    /*11. Realiza un programa que asigne valores a dos variables y representa todas las
    operaciones matemáticas más conocidas.
    o Muestra los datos indicando la operación y los resultados.
    o Combina instrucciones: echo, print y printf.*/
    $a = 73;
    $b = 3;
    echo "Suma: " . ($a + $b) . "<br>";
    print "Resta: " . ($a - $b) . "<br>";
    printf("Multiplicación: %d<br>", $a * $b);
    echo "División: " . ($a / $b) . "<br>";
    echo "Módulo: " . ($a % $b) . "<br>";
    echo "Potencia: " . ($a ** $b);
    ?>
</body>

</html>