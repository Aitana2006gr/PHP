<!DOCTYPE html>
<html>

<head>
    <title>Ejercicios Tipos de Datos</title>
</head>

<body>
    <h3>Tipos de Datos. Actividad 2.1</h3>
    <h4>Ejercicio 8</h4>

    <?php
    /*
    Declara $v1 = null, $v2 = false, $v3 = "15", $v4 = 15. Usa var_dump para ver detalles
    y, en líneas separadas, muestra su tipo con gettype y get_debug_type usando printf.
    Objetivo: comparar inspección detallada y funciones de tipo.*/
    $v1 = null; $v2 = false; $v3 = "15"; $v4 = 15;
        echo "USO DEL VAR_DUMP para ver detalles<br>";
        echo $v1."->";
        var_dump($v1);
        echo "<br>";
        
        foreach (['v1','v2','v3','v4'] as $v) {
            echo "\n\$$v -> "; var_dump($$v);
            printf("gettype=%s, get_debug_type=%s\n", gettype($$v), get_debug_type($$v));
        }
            /*$variable=null;
            $variable2=aa;

            $variables=[$,$,$,$]
            for each
            echo detalles de $index+1.br
            vardump value:$var
            printf format:tipo %s, tipo detallsado %s
            print f*/


    ?>
</body>
</html>