<!DOCTYPE html>
<html>

<head>
    <title>Ejercicios Tipos de Datos</title>
</head>

<body>
    <h2>Tipos de Datos. Actividad 2.2</h2>
    <h3>Ejercicio 4</h3>

    <?php
    /*4. Conversiones forzadas (casting):
    o Aplica (int), (float) y (string) sobre los valores "12.7abc", 7.9 y 15 (cada
    uno por separado).
    o Muestra el valor resultante en cada caso.*/
    $valorA="12.7abc";
    $valorB=7.9;
    $valorC=15;
    echo "Antes de la conversión forzada:";
    echo "A={$valorA}, B=$valorB y C=$valorC<br><br>";
    echo "Despues de la conversion forzada: <br><br>";

    echo "VARIABLE A <br>";
    echo "entero:".(int)$valorA;
    echo "<br>float".(float)$valorA;
    echo "<br>string:".(string)$valorA."<br><br>";
 
    echo "VARIABLE B <br>";
    echo "entero:".(int)$valorB;
    echo "<br>float".(float)$valorB;
    echo "<br>string:".(string)$valorB."<br><br>";

    echo "VARIABLE C <br>";
    echo "entero:".(int)$valorC;
    echo "<br>float".(float)$valorC;
    echo "<br>string:".(string)$valorC."<br>";
    //var_dump(int)$variable
    ?>

</body>

</html>