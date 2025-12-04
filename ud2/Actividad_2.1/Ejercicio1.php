<!DOCTYPE html>
<html>

<head>
    <title>Ejercicios Tipos de Datos</title>
</head>

<body>
    <h3>Tipos de Datos. Actividad 2.1</h3>
    <h4>Ejercicio 1</h4>
    <p>Crea variables de distintos tipos (int, float, string, bool y null). <br>
        Muestra su tipo con gettype y get_debug_type, y luego muestra sus valores con echo y print en líneas separadas. <br>
        Objetivo: comparar tipos reportados y salidas de texto.
    </p>
    <?php
    //Variables de distintos tipos
    $tipoInt = 73;
    $tipoFloat = 7.3;
    $tipoString = "Texto";
    $tipoBoolean = true;
    $tipoNull = null;

    //Muestra el tipo de cada variable con gettype
    print("Tipo de cada variable: <br>");
    echo "tipoInt: " . gettype($tipoInt) . "<br>";
    echo "tipoFloat: " . gettype($tipoFloat) . "<br>";
    echo "tipoString: " . gettype($tipoString) . "<br>";
    echo "tipoBoolean: " . gettype($tipoBoolean) . "<br>";
    echo "tipoNull: " . gettype($tipoNull) . "<br>";

    //Muestra el valor de cada variable con echo y print
    echo "<br>Muestra de get_debug_type y sus valores:<br>";
    echo ("entero: " . get_debug_type($tipoInt) . ": $tipoInt <br>");
    print(get_debug_type($tipoInt) . ": $tipoInt <br>");
    print(get_debug_type($tipoFloat) . ": $tipoFloat <br>");
    print(get_debug_type($tipoString) . ": $tipoString <br>");
    print(get_debug_type($tipoBoolean) . ": $tipoBoolean <br>");
    print(get_debug_type($tipoNull) . ": $tipoNull <br>");
    echo "<br><br>Aitana";
    ?>
</body>

</html>