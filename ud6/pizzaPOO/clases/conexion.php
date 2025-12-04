<?php
//Construye un programa PHP que conecte con la base de datos. 
//Parametros que pueden cambiar
$host = "localhost";
$usuario = "gestor";
$contrasena = "secreto";
$bd = "pizzeria";
try {
    $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
    $conexion = new PDO("mysql:host=$host;dbname=$bd", $usuario, $contrasena, $opciones);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //Mensaje para comprobar si se conecto
    //echo "Conexión establecida con la base de datos '$bd'.";
} catch (PDOException $e) {
    echo $e->getCode();
    $mensaje = $e->getMessage();
    echo '<br>ERROR EN LA CONEXIÓN: ' . $mensaje;
    exit(); //Para cerrar la conexión
}
?>