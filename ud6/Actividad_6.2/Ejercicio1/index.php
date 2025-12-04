<?php
require_once("Empleado.php");
require_once("Encargado.php");
$empleado1 = new Empleado("Luis Carlos", 1500);
$encargado1 = new Encargado("Roberto García", 1500);

echo "<h2>Prueba de empleados</h2>";

echo "<p>Empleado:" . $empleado1->getNombre() . "<br>";
echo "Sueldo: " . $empleado1->getSueldo() . " €</p>";

echo "<p>Encargado:" . $encargado1->getNombre() . "<br>";
echo "<p>Sueldo con incremento: " . $encargado1->getSueldo() . " €</p>";
?>