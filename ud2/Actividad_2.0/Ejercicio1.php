<!DOCTYPE html>
<html>

<head>
    <title>Ejercicios Tipos de Datos</title>
</head>

<body>
    <h3>Tipos de Datos. Actividad 2.0</h3>
    <h4>Ejercicio 1</h4>
    <p>Declara cuatro variables con distintos tipos de datos (un string para un nombre, un
        número entero para una edad, un número decimal para un precio y un booleano
        para indicar si está activo). <br>
        Muestra cada variable en pantalla usando var_dump y,
        luego, vuelve a mostrar solo sus valores usando echo. <br>
        Ejemplo de salida esperada (aproximada): string(4) "Juan", int(25), float(12.5), bool(true)</p>

    <?php
    //Declaración de variables. Se guarda el tipo de dato automáticamente
    $nombre = "Aitana";
    $edad = 18;
    $precio = 15.68;
    $ifActivo = false;

    //El var_dump muestra el tipo de dato y el valor
    echo 'Var_dump de las variables: <br>';
    echo '$nombre: ';
    echo var_dump($nombre) . "<br>";
    echo '$edad: ';
    echo var_dump($edad) . "<br>";
    echo '$precio: ';
    echo var_dump($precio) . "<br>";
    echo '$ifActivo: ';
    echo var_dump($ifActivo) . "<br><br>";

    //Muestra solo los valores con echo
    echo 'Valores de las variables con echo: <br>';
    echo "Nombre: $nombre<br>";
    echo "Edad: $edad<br>";
    echo "Precio: $precio<br>";
    echo "Activo: $ifActivo"; //No muestra nada porque es false, si es true muestra 1
    echo "<br><br>Aitana";

    ?>
</body>

</html>