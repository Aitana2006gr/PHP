<!DOCTYPE html>
<html>

<head>
    <title>Ejercicios Tipos de Datos</title>
</head>

<body>
    <h2>Tipos de Datos. Actividad 2.1</h2>
    <h3>Ejercicio 10</h3>

    <?php
    /*10. Constantes predefinidas:
    o Muestra por pantalla PHP_VERSION y PHP_OS.
    o Añade un texto que indique qué representa cada una.
    o Muestra también el valor de la variable superglobal $_SERVER en cada
    uno de los casos siguientes:
    • $_SERVER['PHP_SELF']
    • $_SERVER['SERVER_ADDR']
    • $_SERVER['SERVER_NAME']
    • $_SERVER['DOCUMENT_ROOT']
    • $_SERVER['REMOTE_ADDR']
    
    */
    echo "PHP_VERSION (Versión de PHP): " . PHP_VERSION . "<br>";
    echo "PHP_OS(Sistema operativo donde se ejecuta PHP): " . PHP_OS . "<br>";
    echo "\$_SERVER['PHP_SELF'](Ruta del script actual): " . $_SERVER['PHP_SELF'] . "<br>";
    echo "\$_SERVER['SERVER_ADDR'](Dirección IP del servidor): " . $_SERVER['SERVER_ADDR'] . "<br>";
    echo "\$_SERVER['SERVER_NAME'](Nombre del servidor): " . $_SERVER['SERVER_NAME'] . "<br>";
    echo "\$_SERVER['DOCUMENT_ROOT'](Directorio raíz de documentos): " . $_SERVER['DOCUMENT_ROOT'] . "<br>";
    echo "\$_SERVER['REMOTE_ADDR'](IP del cliente): " . ($_SERVER['REMOTE_ADDR'] ?? 'CLI') . "<hr>";

    ?>
</body>

</html>