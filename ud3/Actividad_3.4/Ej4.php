<?php
echo "<h2>Ejercicio 4: Registro de Empleados (Array de Arrays Asociativos)</h2>";
$empleados = [
    ["id" => 1, "nombre" => "Juan Pérez", "departamento" => "Ventas", "salario" => 28000],
    ["id" => 2, "nombre" => "Ana García", "departamento" => "IT", "salario" => 35000],
    ["id" => 3, "nombre" => "Gabriel Gallán", "departamento" => "IT", "salario" => 30000],
    ["id" => 4, "nombre" => "Settright Anderson", "departamento" => "Ventas", "salario" => 32000]
];

function empleadosVentas($array)
{
    foreach ($array as $datos) {
        if ($datos["departamento"] == "Ventas") {
            echo "-{$datos["nombre"]} (ID: {$datos["id"]}) - {$datos["salario"]}€<br>";
        }
    }
};

function salarioPromedio($array)
{
    $salarios = array_column($array, "salario"); //Extrae solo los valores de la clave "salario" de cada subarray
    $promedio = array_sum($salarios) / count($salarios); //sumo los valores y cuento el numero de elementos para obtener el promedio
    return number_format($promedio, 2);
}

/*function salarioPromedioEspecifico($array, $busqueda){
    $arrayFiltrado=array_filter($array, fn($a)=>$a["departamento"]===$busqueda);
    $salarios=array_column($arrayFiltrado,"salario");
    if
}
*/

//funcion como callback para el array_filter
function tieneMaxSalario($empleado){
    global $maxSalario;
    return $empleado["salario"]==$maxSalario;
}

function empleadoMayorSalario($array)
{
    global $maxSalario;
    $salarios=array_column($array,"salario");
    $maxSalario = max($salarios);

    $empleadoTop = array_filter($array, 'tieneMaxSalario');
    $empleadoTop = array_shift($empleadoTop);

    echo "{$empleadoTop['nombre']} - €{$empleadoTop['salario']}<br><br>";
}

function salariosIncremento($array){
    foreach($array as &$datos){ //uso referencia & para modificar realmente el dato
        if($datos["departamento"]=="IT"){
            $datos["salario"]*=1.10;
        }
        echo "- {$datos["nombre"]}: ".number_format($datos["salario"],2)."<br>";
    }
    
}


echo "Empleados del departamento Ventas:<br>";
empleadosVentas($empleados);
echo "<br><br>** Salario promedio: " .salarioPromedio($empleados) . "€ **<br><br>";
echo "Empleado con mayor salario:<br>";
empleadoMayorSalario($empleados);
echo "<br>Salarios después de incremento 10% en IT:<br>";
salariosIncremento($empleados);
