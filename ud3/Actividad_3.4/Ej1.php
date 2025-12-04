<?php
echo "<h2>Ejercicio 1: Notas de Estudiantes(Array Posicional)</h2>";
$notas = [7.5, 4.2, 8.9, 6.0, 5.5, 9.2, 3.8, 7.0];


//funcion para calcular la nota media con otras funciones de arrays
function notaMedia($arrayNotas){
    $sumaTotal = array_sum($arrayNotas);
    $elementos = count($arrayNotas);
    $division = $sumaTotal / $elementos;
    return number_format($division, 2);
}

//otra forma de calcular la media a traves de un bucle
function media2($notas){
    $suma = 0;
    $contador = 0;
    foreach ($notas as $nota) {
        $suma += $nota;
        $contador++;
    }
    return number_format($suma / $contador, 2);
}

//funcion para sacar la nota más alta
function alta($notas){
    $alta = max($notas);
    return $alta;
}

//funcion para sacar la nota más baja
function baja($notas){
    $min = min($notas);
    return $min;
}

//funcion para ordenar de mayor a menor y mostrar
function ordenar($notas){
    rsort($notas); // rsort() ordena descendente
    echo implode(", ",$notas);
}

//funcion como callback para el array_filter
function aprobado($notas){
    return $notas >= 5;
}

//funcion que devuelve las notas aprobadas
function aprobados2($notas){
    $aprobados = [];
    foreach ($notas as $nota) {
        if ($nota >= 5) {
            $aprobados[] = $nota;
        }
    }
    return $aprobados;
}

//guardo los resultados de las funciones en variables
$aprobados = count(array_filter($notas, 'aprobado')); //cuenta cuantos aprobaron, solo un numero por el count
$aprobados2 = aprobados2($notas); //devuelve array de las notas aprobadas
$numEstudiantes = count($notas);
//$aprobados=count(array_filter($notas,fn($nota)=>$nota>=5));

var_dump(aprobado($notas));
//resultados
echo "Nota media de la clase: " . notaMedia($notas) . "<br>" . "<br>";

echo "Estudiantes aprobados: $aprobados de $numEstudiantes<br>";
echo "Notas aprobadas: " . implode(", ", $aprobados2)."<br><br>";

echo "Encuentra la nota más alta y la más baja:" . "<br>";
echo "Más alta: ";
echo alta($notas) . "<br>";
echo "Más baja: ";
echo baja($notas);
echo "<br><br>Muestra las notas ordenadas de mayor a menor: " . "<br>";
ordenar($notas);

//echo "-----------------------------------"."<br>";
//var_dump(array_filter($notas, fn($a)=>$a>=7));
