<?php
//CALCULADORA IMC
$peso = 0; //en kilogramos
$altura = 0; // en metros
$imc;

function calcularIMC($peso, $altura)
{
    $imc = $peso / (pow($altura, 2));
    return $imc;
}
function interpretarIMC($imc)
{
    $mensaje = "";
    if ($imc < 18.5) {
        $mensaje = "Bajo peso";
    } elseif ($imc <= 24.9 && $imc >= 18.5) {
        $mensaje = "Peso normal";
    } else if ($imc >= 25 && $imc <= 29.9) {
        $mensaje = "Sobrepeso";
    } else if ($imc >= 30) {
        $mensaje = "Sobrepeso";
    }
    return $mensaje;
}

echo "=== CALCULADORA DE IMC ===<br><br>";
//Caso 1: Persona con peso normal 
$nombre1 = "Juan";
$peso1 = 70;
$altura1 = 1.75;
$imc1 = calcularIMC($peso1, $altura1);
echo "Paciente: " . $nombre1 . "<br>";
echo "Peso: " . $peso1 . " kg<br>";
echo "Altura: " . $altura1 . " m<br>";
echo "IMC: " . number_format($imc1, 2) . "<br>";
echo "Diagnóstico: " . interpretarIMC($imc1) . "<br>";
echo "-------------------------------------------<br><br>";
