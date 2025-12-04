<?php
//Construye un programa PHP que permita obtener un listado de los títulos de todas las
//películas, con su fecha, utilizando el programa que conecta con la base de datos. 
include("conexion.php"); //Se puede usar tmb require("conexion.php"); 
//El require hace que si no está el .php, no ejecuta; en cambio, con include si.

$sql = "SELECT titulo, fecha FROM pelicula"; //ORDER BY fecha si no estuviesen organizados
$resultado = $conexion->query($sql);

echo "<h2>Listado de películas</h2>";
echo "<table border='1'>";
echo "<tr><th>Título</th><th>Fecha</th></tr>";
//Array asociativo
while ($fila = $resultado->fetch()) {
    echo "<tr>";
    echo "<td>" . $fila["titulo"] . "</td>";
    echo "<td>" . $fila["fecha"] . "</td>";
    echo "</tr>";
    //echo "<li>{$fila['titulo']} ({$fila['fecha']})</li>";
}
?>
