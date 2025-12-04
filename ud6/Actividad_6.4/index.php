<?php
require_once "Aeropuerto.php";
require_once "Avion.php";
require_once "Helicoptero.php";

echo "<h2>--- PROGRAMA PRINCIPAL ---</h2>";

// 1. Crear aeropuerto
$a = new Aeropuerto();

// 2. Crear 3 aviones
$v1 = new Avion("Avion1", 2, 2, "Iberia", "2020-01-01", 10000);
$v2 = new Avion("Avion2", 2, 4, "Ryanair", "2021-05-12", 9000);
$v3 = new Avion("Avion3", 2, 2, "Iberia", "2019-08-03", 11000);

// 3. Crear 3 helicópteros
$h1 = new Helicoptero("Heli1", 0, 1, "Juan", 3);
$h2 = new Helicoptero("Heli2", 0, 1, "Maria", 2);
$h3 = new Helicoptero("Heli3", 0, 1, "Aitana", 4);

// Insertarlos
$a->insertar($v1);
$a->insertar($v2);
$a->insertar($v3);
$a->insertar($h1);
$a->insertar($h2);
$a->insertar($h3);

// 4. Probar buscar
$a->buscar("Avion1");      // existe
$a->buscar("Fantasma");    // no existe

// 5. listarCompania
$a->listarCompania("Iberia");
$a->listarCompania("NoExiste");

// 6. rotores
$a->rotores(3);  // existe
$a->rotores(9);  // no existe

// 7. Despegue de un avión
$avionDespegado = $a->despegar("Avion1", 500, 200);
echo $avionDespegado->volando() ? "<br>Está volando.<br>" : "<br>No está volando.<br>";
$avionDespegado->mostrarInformacion();

// 8. Despegue de helicóptero
$heliDespegado = $a->despegar("Heli1", 200, 100);
echo $heliDespegado->volando() ? "<br>Está volando.<br>" : "<br>No está volando.<br>";
$heliDespegado->mostrarInformacion();
?>
