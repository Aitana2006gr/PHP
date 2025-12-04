<!DOCTYPE html>
<html>

<head>
    <title>Ejercicios Tipos de Datos</title>
</head>

<body>
    <h3>Tipos de Datos. Actividad 2.1</h3>
    <h4>Ejercicio 4</h4>
    <p>Crea $a = 10, $b = 3.14, $c = "100", $d = true. Usa is_int, is_float, is_string, is_bool e is_numeric<br>
        para cada variable y muestra los resultados con printf en formato:<br>
        Variable X -> is_int=%s, is_numeric=%s. Objetivo: diferenciar tipos vs “numérico”.
    </p>
    <?php
    //Variables
    $a = 10;
    $b = 3.14;
    $c = "100";
    $d = true;

    //print (is_int($a)); //true

    //Variable a
    echo "Variable a -> ";
    printf(//printf permite formatear la salida. En este caso, usamos %s para strings, y el operador ternario ?:
        //para mostrar 'true' o 'false' según el resultado de cada función is_laquesea.
        "is_int=%s, is_float=%s, is_string=%s, is_bool=%s, is_numeric=%s<br>",
        is_int($a) ? 'true' : 'false',
        is_float($a) ? 'true' : 'false',
        is_string($a) ? 'true' : 'false',
        is_bool($a) ? 'true' : 'false',
        is_numeric($a) ? 'true' : 'false'
    );

    //Variable b
    echo "Variable b-> ";
    printf(
        "is_int=%s, is_float=%s, is_string=%s, is_bool=%s, is_numeric=%s<br>",
        is_int($a) ? 'true' : 'false',
        is_float($a) ? 'true' : 'false',
        is_string($a) ? 'true' : 'false',
        is_bool($a) ? 'true' : 'false',
        is_numeric($a) ? 'true' : 'false'
    );

    //Variable c
    echo "Variable c -> ";
    printf(
        "is_int=%s, is_float=%s, is_string=%s, is_bool=%s, is_numeric=%s<br>",
        is_int($c) ? 'true' : 'false',
        is_float($c) ? 'true' : 'false',
        is_string($c) ? 'true' : 'false',
        is_bool($c) ? 'true' : 'false',
        is_numeric($c) ? 'true' : 'false'
    );

    //Variable d
    echo "Variable d -> ";
    printf(
        "is_int=%s, is_float=%s, is_string=%s, is_bool=%s, is_numeric=%s<br>",
        is_int($d) ? 'true' : 'false',
        is_float($d) ? 'true' : 'false',
        is_string($d) ? 'true' : 'false',
        is_bool($d) ? 'true' : 'false',
        is_numeric($d) ? 'true' : 'false'
    );
    echo "<br><br>Aitana";

    ?>
</body>

</html>