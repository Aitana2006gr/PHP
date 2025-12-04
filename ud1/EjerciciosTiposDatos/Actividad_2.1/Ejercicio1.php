<!DOCTYPE html>
<html>

<head>
    <title>Ejercicios Tipos de Datos</title>
</head>

<body>
    <h2>Tipos de Datos. Actividad 2.1</h2>
    <h3>Ejercicio 1</h3>

    <?php
    /*Crea variables de distintos tipos (int, float, string, bool y null). Muestra su tipo con
    gettype y get_debug_type, y luego muestra sus valores con echo y print en líneas
    separadas. Objetivo: comparar tipos reportados y salidas de texto.
    */
    $tipoInt = 73;
    $tipoFloat = 7.3;
    $tipoString = "Texto";
    $tipoBoolean = true;
    $tipoNull = null;
    print("Tipo de cada variable: <br>");
    echo "tipoInt: " . gettype($tipoInt) . "<br>";
    echo "tipoFloat: " . gettype($tipoFloat) . "<br>";
    echo "tipoString: " . gettype($tipoString) . "<br>";
    echo "tipoBoolean: " . gettype($tipoBoolean) . "<br>";
    echo "tipoNull: " . gettype($tipoNull) . "<br>
    <br>Muestra de get_debug_type y sus valores:<br>";
    echo("entero: ".get_debug_type($tipoInt) . ": $tipoInt <br>");
    print(get_debug_type($tipoInt) . ": $tipoInt <br>");
    print(get_debug_type($tipoFloat) . ": $tipoFloat <br>");
    print(get_debug_type($tipoString) . ": $tipoString <br>");
    print(get_debug_type($tipoBoolean) . ": $tipoBoolean <br>");
    print(get_debug_type($tipoNull) . ": $tipoNull <br>");
    echo "<br>";
    //valores con echo:
    //echo
    //entero: $entero ($tipoint).br
    //valores con print igual
    //print
    ?>
</body>

</html>