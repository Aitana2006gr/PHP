<!DOCTYPE html>
<html>

<head>
    <title>Ejercicios Tipos de Datos</title>
</head>

<body>
    <h2>Tipos de Datos. Actividad 2.2</h2>
    <h3>Ejercicio 16</h3>

    <?php
    /*16. Constantes y cálculo de impuestos:
    DESARROLLO WEB ENTORNO SERVIDOR
    Variables, operadores y expresiones en PHP
    o Define una constante TASA con valor 0.21.
    o Declara $importe = 150.
    o Calcula $iva = $importe * TASA y $total = $importe + $iva.
    o Muestra importe, IVA y total.*/
    echo "<h2>16. Constantes e IVA</h2>";
    define("TASA", 0.21);
    $importe = 150;
    $iva = $importe * TASA;
    $total = $importe + $iva;
    echo "Importe: $importe – IVA: $iva – Total: $total<hr>";

    ?>
</body>

</html>