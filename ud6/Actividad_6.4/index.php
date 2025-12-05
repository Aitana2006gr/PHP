<?php
require_once "Aeropuerto.php";
//Creo el objeto aeropuerto
$aeropuerto = new Aeropuerto();

//Creo 3 aviones
$a1 = new Avion("Boeing737", 2, 2, "Iberia", "2020-01-01", 12000);
$a2 = new Avion("Airbus320", 2, 2, "Iberia", "2019-06-10", 11000);
$a3 = new Avion("Fokker100", 2, 2, "Vueling", "2018-04-15", 9000);

//Creo 3 helicopteros
$h1 = new Helicoptero("Boeing AH-64 Apache", 0, 1, "Juan", 2);
$h2 = new Helicoptero("Bell UH-1 Iroquois (Huey)", 0, 1, "Luis", 3);
$h3 = new Helicoptero("Mil Mi-24 (Hind)", 0, 1, "Pedro", 4);

//Inserto a todos en el aeropuerto
$aeropuerto->insertar($a1);
$aeropuerto->insertar($a2);
$aeropuerto->insertar($a3);
$aeropuerto->insertar($h1);
$aeropuerto->insertar($h2);
$aeropuerto->insertar($h3);

//Pruebo el método buscar
echo "<h3>MÉTODO BUSCAR</h3>";
$aeropuerto->buscar("Airbus320");
$aeropuerto->buscar("NoExiste");
echo "<hr>";

//Pruebo el método listarCompania
echo "<h3>MÉTODO LISTARCOMPANIA</h3>";
$aeropuerto->listarCompania("Iberia");
$aeropuerto->listarCompania("Fantasma");
echo "<hr>";

//Pruebo el método rotores
echo "<h3>MÉTODO ROTORES</h3>";
$aeropuerto->rotores(3);
$aeropuerto->rotores(10);
echo "<hr>";

//Pruebo el método despegar de un avión
echo "<h3>MÉTODO DESPEGAR avion</h3>";
$avion = $aeropuerto->despegar("Boeing737", 1000, 200);
echo $avion->volando() ? "El avión está volando<br>" : "El avión no está volando<br>";
$avion->mostrarInformacion();
echo "<hr>";

//Pruebo el método despegar de un helicóptero
echo "<h3>MÉTODO DESPEGAR helicoptero</h3>";
$heli = $aeropuerto->despegar("Bell UH-1 Iroquois (Huey)", 200, 80);
echo $heli->volando() ? "El helicóptero está volando<br>" : "El helicóptero no está volando<br>";
$heli->mostrarInformacion();
echo "<hr>";
?>
