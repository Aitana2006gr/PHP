<!DOCTYPE html>
<html>

<head>
    <title>Ejercicios Tipos de Datos</title>
</head>

<body>
    <h3>Tipos de Datos. Actividad 2.0</h3>
    <h4>Ejercicio 9</h4>
    <p>Demuestra la diferencia entre variables locales y globales con el mismo nombre:<br>
        declara una variable color con valor “azul” fuera de una función.<br>
        Dentro de una función, declara una variable color con valor “rojo” (sin usar global) y muéstrala con echo.<br>
        Luego, fuera de la función, muestra la variable original. Observa cómo cambian. <br>
        Ejemplo de salida esperada: <br>
        Dentro: rojo; Fuera: azul.
    </p>
    <?php
    $color = "azul"; //variable externa
    function mostrarColor(){
        $color = "rojo"; //variable interna
        echo "Dentro de la función: $color<br>"; //muestra el color rojo
    }
    mostrarColor();
    echo "Fuera de la función: $color<br>"; //muestra el color azul
    echo "<br><br>Aitana";
    ?>
</body>

</html>