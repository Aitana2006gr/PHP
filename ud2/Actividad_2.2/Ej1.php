<!DOCTYPE html>
<html>

<head>
    <title>Ejercicios Tipos de Datos</title>
</head>

<body>
    <h2>Tipos de Datos. Actividad 2.2</h2>
    <h3>Ejercicio 1</h3>

    <?php
    /*Cambios de tipo con suma:
    o Declara $x.
    o Asígnale 10 (entero) y muestra $x + 2.
    o Asígnale "10" (cadena con dígitos) y muestra $x + 2.
    o Asígnale 10.5 (coma flotante) y muestra $x + 2.
    o Comenta las diferencias observadas en la salida.*/
    echo "CAMBIOS DE TIPO CON SUMA <br>";
    $x;
    $x=10;
    echo "Entero: ".$x+2;
    $x="10";
    echo "<br>Cadena con dígitos: ".$x+2;
    $x=10.5;
    echo "<br>Coma flotante: ".$x+2;

    // Desactivar toda notificación de error
    //error_reporting(0);

    //Notificar solamente errores de ejecucción
    //error_reporting(E_ERROR|E_PARSE);

    //Notificar E_NOTICE también puede ser bueno 

    ?>
</body>

</html>