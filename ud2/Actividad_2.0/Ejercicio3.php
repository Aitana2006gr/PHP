<!DOCTYPE html>
<html>

<head>
    <title>Ejercicios Tipos de Datos</title>
</head>

<body>
    <h3>Tipos de Datos. Actividad 2.0</h3>
    <h4>Ejercicio 3</h4>
    <p>Crea dos variables de tipo string: una con tu nombre y otra con el nombre de un curso. <br>
        Concaténalas en un mensaje de saludo y muéstralo con echo en una sola línea.<br>
        Ejemplo de salida esperada: Hola, Ana. Bienvenida al curso de PHP <br>
    </p>
    <?php
    //Declaración de variables string
    $nombre = "Aitana";
    $curso = "DAW2";
    
    //Concatenación y muestra del mensaje
    $mensajeSaludo = "Hola, $nombre. Bienvenida al curso de PHP de $curso";
    echo $mensajeSaludo;
    echo "<br><br>Aitana";
    ?>
</body>

</html>