<?php
echo "<h2>Ejercicio 5: Días de la semana (Array Posicional)</h2>";
$diasSemana = [
    "Lunes",
    "Martes",
    "Miércoles",
    "Jueves",
    "Viernes",
    "Sábado",
    "Domingo"
];
$diasLaborables = array_slice($diasSemana, 0, 5);
$finSemana = array_slice($diasSemana, 5, 6);

function diasEtiqueta($diasSemana, $diasLaborables)
{
    foreach ($diasSemana as $dia) {
        $etiqueta = in_array($dia, $diasLaborables) ? "(Trabajar)" : "(Descansar)";
        echo "-$dia " . $etiqueta . "<br>";
    }
}

function diasInverso($array){
    $array=array_reverse($array);
    echo implode(", ", $array);
}

echo "Días laborables: <br>" . implode(", ", $diasLaborables) . "<br>";
echo "<br>Fin de semana: <br>" . implode(", ", $finSemana) . "<br>";
echo "<br>Días con etiquetas:<br>";
diasEtiqueta($diasSemana, $diasLaborables)."<br>";
echo "<br>Días en orden inverso: <br>";
echo diasInverso($diasSemana);
