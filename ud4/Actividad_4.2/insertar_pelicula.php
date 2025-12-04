<?php
include("conexion.php");
$consulta = $bd_g->prepare('INSERT INTO familia (cod, nombre) VALUES (?, ?)');
$consulta->bindColumn(1, $cod_producto);
$consulta->bindColumn(2, $nombre_producto);
$consulta->bindColumn(2, $nombre_producto);
$consulta->execute();
//bindColumn
?>