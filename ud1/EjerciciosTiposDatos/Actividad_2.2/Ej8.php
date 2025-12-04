<!DOCTYPE html>
<html>

<head>
    <title>Ejercicios Tipos de Datos</title>
</head>

<body>
    <h2>Tipos de Datos. Actividad 2.1</h2>
    <h3>Ejercicio 8</h3>

    <?php
    /*8. Codifica un programa llamado alcance.php que ejecute el ejemplo relativo al
    epígrafe “Ámbito de las variables” de los apuntes. (¡Cuidado con las comillas!!)
    y muestra el contador en cada llamada.*/

    function PruebaSinGlobal()
    {
        $var++;
        echo "Prueba sin global. \$var: " . $var . "<br>";
    }
    function PruebaConGlobal()
    {
        global $var;
        $var++;
        echo "Prueba con global. \$var: " . $var . "<br>";
    }
    function PruebaConGlobals()
    {
        $GLOBALS["var"]++;
        echo "Prueba con GLOBALS. \$var: " . $GLOBALS["var"] . "<br>";
    }
    $var = 20; //variable de prueba
    PruebaSinGlobal();
    print "\$var=" . $var . "<br>";
    PruebaConGlobal();
    print "\$var=" . $var . "<br>";
    PruebaConGlobals();
    print "\$var=" . $var . "<br>";
    ?>
</body>

</html>