<?php
require_once "conexionBD.php";

function getTodosLosArticulos()
{
    // Conectar con la base de datos y seleccionarla
    $conexion = getConexion();
    // Ejecutar la consulta SQL
    $sql = "select nombre_corto, PVP from producto";
    $resultado = $conexion->query($sql);

    $articulos = array();
    while ($fila = $resultado->fetch()) {
        $articulos[] = $fila;
    }
    return $articulos;
}
