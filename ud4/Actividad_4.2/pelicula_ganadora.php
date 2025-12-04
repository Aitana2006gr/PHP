<?php
//Construye un programa PHP que permita obtener la película ganadora del Goya en el año 2014. 
include("conexion.php");

//$sql = "SELECT titulo, fecha, numGoyas FROM pelicula WHERE fecha='2014'ORDER BY numGoyas DESC LIMIT 1"; //Serviría solo si hay un resultado, pero por si acaso hago el max
$sqlMaxGoyas = "SELECT MAX(numGoyas) AS maxGoyas FROM pelicula WHERE fecha='2014'";
$resultadoMaxGoyas = $conexion->query($sqlMaxGoyas);

$filaMax = $resultadoMaxGoyas->fetch();
$maxGoyas = $filaMax["maxGoyas"];

$sql = "SELECT titulo, fecha, numGoyas FROM pelicula WHERE fecha='2014' AND numGoyas='$maxGoyas'";
$resultado = $conexion->query($sql);
echo "<h2>Película Ganadora con más Goyas de 2014</h2>";
//array asociativo
if ($resultado) {
    while ($fila = $resultado->fetch()) {
        echo "Titulo: " . $fila["titulo"] . "<br>";
        echo "Año: " . $fila["fecha"] . "<br>";
        echo "Goyas ganados: " . $fila["numGoyas"] . "<br>";
    }
}else{
    echo "ERROR: No se pudo obtener la película";
}
?>
