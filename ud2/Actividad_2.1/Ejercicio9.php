<!DOCTYPE html>
<html>

<head>
    <title>Ejercicios Tipos de Datos</title>
</head>

<body>
    <h3>Tipos de Datos. Actividad 2.1</h3>
    <h4>Ejercicio 9</h4>
    <p>Declara tres cadenas: $e1 = "007", $e2 = "7e2", $e3 = "12abc". Para cada una:<br>
        o Muestra con printf si is_numeric devuelve true o false.<br>
        o Si es numérica, conviértela a float con casting o settype y muéstrala con printf con 2 decimales.<br>
        o Si no es numérica, muestra un aviso con print. Objetivo: validar y convertir entradas.
    </p>
    <?php
    $e1 = "007";
    $e2 = "7e2";
    $e3 = "12abc";


    //e1
    echo "Cadena e1";

    printf(
        "Cadena e1 = '%s' -> is_numeric: %s<br>",
        $e1,
        is_numeric($e1) ? 'true' : 'false'
    );

    if (is_numeric($e1)) {
        $convertido = (float)$e1;
        printf("Convertido a float: %.2f<br>\n", $convertido);
    } else {
        print "AVISO: La cadena no es numérica<br>\n";
    }
    echo "<br>\n";

    //e2
    printf(
        "Cadena e2 = '%s' -> is_numeric: %s<br>\n",
        $e2,
        is_numeric($e2) ? 'true' : 'false'
    );

    if (is_numeric($e2)) {
        $convertido = (float)$e2;
        printf("Convertido a float: %.2f<br>\n", $convertido);
    } else {
        print "AVISO: La cadena no es numérica<br>\n";
    }
    echo "<br>\n";

    //e3
    printf(
        "Cadena e3 = '%s' -> is_numeric: %s<br>\n",
        $e3,
        is_numeric($e3) ? 'true' : 'false'
    );

    if (is_numeric($e3)) {
        $convertido = (float)$e3;
        printf("Convertido a float: %.2f<br>\n", $convertido);
    } else {
        print "AVISO: La cadena no es numérica<br>\n";
    }
    echo "<br>\n";


    ?>
</body>

</html>