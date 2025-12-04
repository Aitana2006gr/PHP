<!DOCTYPE html>
<html>

<head>
    <title>Ejercicios Tipos de Datos</title>
</head>

<body>
    <h3>Tipos de Datos. Actividad 2.1</h3>
    <h4>Ejercicio 8</h4>
    <p>Declara $v1 = null, $v2 = false, $v3 = "15", $v4 = 15. Usa var_dump para ver detalles y, <br>
        en líneas separadas, muestra su tipo con gettype y get_debug_type usando printf.<br>
        Objetivo: comparar inspección detallada y funciones de tipo.<br>
    </p>
    <?php
    $v1 = null;
    $v2 = false;
    $v3 = "15";
    $v4 = 15;

    //Variable v1
    echo "VARIABLE v1:<br>";
    echo "var_dump: "; //var_dump para ver detalles: muestra el tipo y valor de la variable
    var_dump($v1);
    echo "<br>";
    printf("gettype: %s<br>", gettype($v1)); //gettype devuelve el tipo de la variable como string
    printf("get_debug_type: %s<br>", get_debug_type($v1)); //get_debug_type devuelve el tipo de la variable, con más detalles en algunos casos
    echo "<br>";

    //Variable v2
    echo "VARIABLE v2:<br>";
    echo "var_dump: ";
    var_dump($v2);
    echo "<br>";
    printf("gettype: %s<br>", gettype($v2));
    printf("get_debug_type: %s<br>", get_debug_type($v2));
    echo "<br>";

    //Variable v3
    echo "VARIABLE v3:<br>";
    echo "var_dump: ";
    var_dump($v3);
    echo "<br>";
    printf("gettype: %s<br>", gettype($v3));
    printf("get_debug_type: %s<br>", get_debug_type($v3));
    echo "<br>";

    //Variable v4
    echo "VARIABLE v4:<br>";
    echo "var_dump: ";
    var_dump($v4);
    echo "<br>";
    printf("gettype: %s<br>", gettype($v4));
    printf("get_debug_type: %s<br>", get_debug_type($v4));
    echo "<br><br>Aitana";

    ?>
</body>

</html>