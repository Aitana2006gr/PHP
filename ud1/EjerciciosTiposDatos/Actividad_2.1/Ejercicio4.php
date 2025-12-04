<!DOCTYPE html>
<html>

<head>
    <title>Ejercicios Tipos de Datos</title>
</head>

<body>
    <h3>Tipos de Datos. Actividad 2.1</h3>
    <h4>Ejercicio 4</h4>

    <?php
    /*Crea $a = 10, $b = 3.14, $c = "100", $d = true. Usa is_int, is_float, is_string, is_bool e
is_numeric para cada variable y muestra los resultados con printf en formato:
Variable X -> is_int=%s, is_numeric=%s. Objetivo: diferenciar tipos vs “numérico”.*/
    $a = 10;
    $b = 3.14;
    $c = "100";
    $d = true;
    //print (is_int($a)); //true
   //  print($a);
    foreach (['a', 'b', 'c', 'd'] as $variable) {
        printf(
            "Variable \$%s=-> is_int=%s, \n is_float=%s, is_string=%s, is_bool=%s, is_numeric=%s\n <br><br>",
            $variable,
            is_int($$variable) ? 'true' : 'false',
            is_float($$variable) ? 'true' : 'false',
            is_string($$variable) ? 'true' : 'false',
            is_bool($$variable) ? 'true' : 'false',
            is_numeric($$variable) ? 'true' : 'false'
        );
    }
    ?>
</body>

</html>