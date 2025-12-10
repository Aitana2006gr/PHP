<?php
//Construye un programa PHP que conecte con la base de datos. 
//Parámetros que pueden cambiar
$host = "localhost";
$usuario = "gestor";
$contrasena = "secreto";
$bd = "dwes";

try {
    $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
    //Creación de la conexión con PDO
    $conexion = new PDO("mysql:host=$host;dbname=$bd", $usuario, $contrasena, $opciones);
    //Configuración del modo de errores
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //Mensaje por si fue exitosa la conexión
    //echo "Conexión establecida con la base de datos '$bd'.";
} catch (PDOException $e) {
    echo $e->getCode();
    $mensaje ="ERROR EN LA CONEXION". $e->getMessage();
    exit(); //Para cerrar la conexión
}