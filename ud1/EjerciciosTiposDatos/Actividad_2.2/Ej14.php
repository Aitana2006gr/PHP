<!DOCTYPE html>
<html>

<head>
    <title>Ejercicios Tipos de Datos</title>
</head>

<body>
    <h2>Tipos de Datos. Actividad 2.2</h2>
    <h3>Ejercicio 14</h3>

    <?php
    /*14. Incremento y decremento:
    Estos operadores incrementan o decrementan el valor del operando al que se 
    aplican.
    Si se utilizan junto a una expresión de asignación, modifican el operando antes 
    o después de la asignación en función de su posición (antes o después) con 
    respecto al operando. 
    Por ejemplo:
    $a = 5; $b = ++$a; ¿Qué valores tienen ahora $a y $b?
    $a = 5; $b = $a++; ¿Qué valores tienen ahora $a y $b?
    Saca conclusiones.*/
    //Antes: primero incrementa y luego asigna
    $a = 5;
    $b = ++$a;
    echo "++ antes: a=$a, b=$b<br>";
    $a = 5;
    $b = $a++;
    echo "++ después: a=$a, b=$b<hr>";
    ?>
</body>

</html>