<?php
echo "<h2>Ejercicio 6: Temperaturas Mensuales</h2>";
$temperaturas = [
    "Enero" => 8,
    "Febrero" => 10,
    "Marzo" => 13,
    "Abril" => 16,
    "Mayo" => 20,
    "Junio" => 25,
    "Julio" => 30,
    "Agosto" => 29,
    "Septiembre" => 24,
    "Octubre" => 18,
    "Noviembre" => 12,
    "Diciembre" => 9
];


$minTemperatura = min($temperaturas);

function mesCaluroso($temperaturas)
{
    $maxTemperatura = max($temperaturas);
    $mesCaluroso = array_search($maxTemperatura, $temperaturas);
    echo $mesCaluroso . " ($maxTemperatura) °C";
}

function mesFrio($temperaturas)
{
    $minTemperatura = min($temperaturas);
    $mesFrio = array_search($minTemperatura, $temperaturas);
    echo $mesFrio . " ($minTemperatura) °C";
}

function temperaturaMedia($temperaturas)
{
    $sumaTotal = array_sum($temperaturas);
    $elementos = count($temperaturas);
    $media = $sumaTotal / $elementos;
    echo number_format($media);
}
function tempMayor20($temperaturas){
    foreach ($temperaturas as $mes=>$temp){
        if ($temp>20){
            echo "-$mes: {$temp}°C<br>";
        }
    }
}
function tempMenor15($temperaturas){
    $num=0;
    foreach ($temperaturas as $mes=>$temp){
        if($temp<15){
        //echo "-$mes: {$temp}°C<br>";
        $num++;
        }
    }
    echo $num." meses";
    
}



echo "Mes más caluroso: ";
mesCaluroso($temperaturas);
echo "<br><br>Mes más frio: ";
mesFrio($temperaturas);
echo "<br><br>**Temperatura media anual: ";
temperaturaMedia($temperaturas);
echo " °C**";;
echo "<br><br>Meses con temperatura>20°C:<br>";
tempMayor20($temperaturas);
echo "<br>Meses con temperatura<15°C:<br>";
tempMenor15($temperaturas);


