<?php
require_once "Medico.php";
require_once "MedicoFamilia.php";
require_once "MedicoUrgencias.php";

//Creamos el array de médicos
$medicos = [];

//3 médicos de familia
$medicos[] = new MedicoFamilia("Ana", 45, "mañana", 120);
$medicos[] = new MedicoFamilia("Juan", 60, "tarde", 200);
$medicos[] = new MedicoFamilia("Lucia", 55, "mañana", 180);

//3 médicos de urgencias
$medicos[] = new MedicoUrgencias("Carlos", 65, "tarde", "Unidad 1");
$medicos[] = new MedicoUrgencias("Marta", 50, "mañana", "Unidad 2");
$medicos[] = new MedicoUrgencias("Pedro", 70, "tarde", "Unidad 3");

function getTodosMedicos($medicos)
{
    //Ver todos los datos
    echo "<h2>Todos los médicos:</h2>";
    foreach ($medicos as $medico) {
        $medico->mostrarDatos();
    }
}

//Número de médicos de urgencias de turno tarde con más de 60 años
$contador = 0;
foreach ($medicos as $medico) {
    if ($medico instanceof MedicoUrgencias && $medico->getTurno() == "tarde" && $medico->getEdad() > 60) {
        $contador++;
    }
}
echo "<h3>Número de médicos de urgencias de turno tarde mayores de 60: $contador</h3>";

//Médicos de familia con num_pacientes >= 150
echo "<h3>Médicos de familia con 150 o más pacientes:</h3>";
foreach ($medicos as $medico) {
    if ($medico instanceof MedicoFamilia && $medico->getNumPacientes() >= 150) {
        $medico->mostrarDatos();
    }
}

getTodosMedicos($medicos);
