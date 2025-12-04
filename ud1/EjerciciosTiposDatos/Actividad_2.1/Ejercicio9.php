<!DOCTYPE html>
<html>

<head>
    <title>Ejercicios Tipos de Datos</title>
</head>

<body>
    <h3>Tipos de Datos. Actividad 2.1</h3>
    <h4>Ejercicio 9</h4>

    <?php
    /*
    Declara tres cadenas: $e1 = "007", $e2 = "7e2", $e3 = "12abc". Para cada una:
    o Muestra con printf si is_numeric devuelve true o false.
    o Si es numérica, conviértela a float con casting o settype y muéstrala con
    printf con 2 decimales.
    o Si no es numérica, muestra un aviso con print. Objetivo: validar y convertir
    entradas.*/

    $e1 = "007"; $e2 = "7e2"; $e3 = "12abc";
foreach (['e1','e2','e3'] as $v) {
    $val = $$v;
    $num = is_numeric($val);
    printf("\$%s=%s "."is_numeric=%s"."<br>", $v."<br>", $val."<br>", $num?'true':'false'."<br>");
    if ($num) {
        $f = (float)$val;
        printf("Convertido a float: %.2f\n", $f);
    } else {
        print "No es numérico\n";
    }
}


    ?>
</body>
</html>