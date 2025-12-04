<?php
//Construye un programa PHP que permita obtener el número total de directores y de películas de la base de datos.
include("conexion.php");

$sqlPeliculas = "SELECT COUNT(*) AS totalPeliculas FROM pelicula";
$sqlDirectores= "SELECT COUNT(*) AS totalDirectores FROM director";

$resultadoPeliculas = $conexion->query($sqlPeliculas);
$resultadoDirectores= $conexion->query($sqlDirectores);

echo "<h2>Números Totales</h2>";
$filaPeliculas=$resultadoPeliculas->fetch();
echo "Total de Peliculas:".$filaPeliculas["totalPeliculas"]."<br>";
$filaDirectores=$resultadoDirectores->fetch();
echo "Total de Directores:".$filaDirectores["totalDirectores"];
?>