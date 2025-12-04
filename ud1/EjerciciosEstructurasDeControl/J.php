<!DOCTYPE html>
<html>

<head>
    <title>Ejercicios Estructuras de control</title>
</head>

<body>
    <h3>Actividad 3.1</h3>
    <h4>Ejercicio j</h4>

    <?php
    /*Determinar el precio un viaje (ida y vuelta) con estancia, conociendo la distancia a
    recorrer en ferrocarril y los días de estancia. En el cálculo tendremos en cuenta que si
    el número de días de estancia es superior a 7 y la distancia es superior a 800 km el
    billete tiene una reducción del 30 por ciento. Si la distancia es inferior a 50 km el coste
    total tiene un recargo del 10%. El precio por km es de 2.5€, y el día de estancia son
    10€*/
    $distancia = 40;
    $estancia = 8;
    define("PKM", 2.5);
    define("PEST", 10);
    $pvp = 2 * $distancia * PKM + $estancia * PEST;
    if ($estancia > 7 && $distancia > 800)
        $pvp = 0.70 * $pvp;
    if ($distancia < 50)
        $pvp = 1.10 * $pvp;
    echo "Su viaje de $estancia días a $distancia km. tiene un coste total de $pvp €.";

    ?>
</body>
</html>