<!DOCTYPE html>
<html>

<head>
    <title>Ejercicios Tipos de Datos</title>
</head>

<body>
    <h1>Ejercicios Tipos de Datos</h1>

    <?php
    /*Declara cuatro variables con distintos tipos de datos (un string para un nombre, un
número entero para una edad, un número decimal para un precio y un booleano
para indicar si está activo). Muestra cada variable en pantalla usando var_dump y,
luego, vuelve a mostrar solo sus valores usando echo. Ejemplo de salida esperada
(aproximada): string(4) "Juan", int(25), float(12.5), bool(true)*/
    echo "Ejercicio 1";
    echo "<br>";
    $nombre = "Aitana";
    $edad = 18;
    $precio = 15.68;
    $ifActivo = false;

    var_dump($nombre, $edad, $precio, $ifActivo);
    var_dump($nombre);
    var_dump($edad);
    echo "<br>";
    print("<br>\n Si me va el echo <br>");
    echo "Nombre, $nombre";
    //echo "<br>";
    //echo $nombre . "<br>";
    //echo "<p>Nombre: ${nombre}</p>";
    ?>
</body>

</html>