<?php
// Iniciamos la sesión o recuperamos la anterior sesión existente
session_start();
// Cada vez que recargamos la página añadimos un valor los arrays 
// "diavisitas" y "horavisitas"
$_SESSION['diavisitas'][] = date("d/m/Y");
$_SESSION['horavisitas'][] = date("H:i:s");

$now = date("H:i:s - d/m/Y");
echo "Momento actual: ",$now,"<br>";
print_r($_SESSION['diavisitas']);
echo "<br>";
print_r($_SESSION['horavisitas']);
?>
