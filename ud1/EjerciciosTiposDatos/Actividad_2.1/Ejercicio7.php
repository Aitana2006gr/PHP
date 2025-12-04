<!DOCTYPE html>
<html>

<head>
    <title>Ejercicios Tipos de Datos</title>
</head>

<body>
    <h3>Tipos de Datos. Actividad 2.1</h3>
    <h4>Ejercicio 7</h4>

    <?php
    /*
    Construye un texto multilínea con heredoc que incluya variables $nombre, $edad y
    $saldo (formatea $saldo con number_format o sprintf). Muestra el bloque con echo
    y añade una línea final con print. Objetivo: salidas legibles en varias líneas.
*/
$nombre = "Gabriel";
$edad   = 24;
$saldo  = 2400.475;
$formateado=number_format($saldo,2);
//poner el pre
$texto = <<<TEXTO
<pre>======INFO========
Nombre: $nombre
Edad: $edad años
Saldo: $saldo euros
Saldo: $formateado euros
========================
<pre>
TEXTO;
echo $texto;
print "Fin del bloque. Linea final";

    ?>
</body>
</html>