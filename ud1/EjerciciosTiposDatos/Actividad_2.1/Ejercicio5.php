<!DOCTYPE html>
<html>

<head>
    <title>Ejercicios Tipos de Datos</title>
</head>

<body>
    <h3>Tipos de Datos. Actividad 2.1</h3>
    <h4>Ejercicio 5</h4>

    <?php
    /*Declara un número grande $monto = 1234567.5. Muestra el valor con echo tal cual,
    luego con number_format con 0 decimales, con 2 decimales y finalmente con
    separadores personalizados (coma decimal y punto de miles). Objetivo: formateo
    de números para pantalla.*/
    $monto = 1234567.5;
    echo $monto . ": variable normal<br>";
    echo number_format($monto, 0) . ": variable con 0 decimales<br>";
    echo number_format($monto, 2) . ": variable con 2 decimales<br>";
    echo number_format($monto, 2, ',', '.') . ": variable con personalizado, coma decimal y punto<br>"; 
    //formato europeo
    //num: variable, decimals, 
    ?>
</body>

</html>