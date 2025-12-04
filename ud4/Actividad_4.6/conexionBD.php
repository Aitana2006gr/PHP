<?php
//Construye un programa PHP que conecte con la base de datos. 
//Parametros que pueden cambiar
$host = "localhost";
$usuario = "gestor";
$contrasena = "secreto";
$bd = "dwes_01_nba";

function getConexion($host, $usuario, $contrasena, $bd){
    $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
    //Creación de la conexión con PDO
    $conexion = new PDO("mysql:host=$host;dbname=$bd", $usuario, $contrasena, $opciones);
    //Configuración del modo de errores
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //Mensaje por si fue exitosa la conexión
    echo "Conexión establecida con la base de datos '$bd'.<br>";
    return $conexion;
}
try {
    $conexion=getConexion($host, $usuario, $contrasena, $bd);
} catch (PDOException $e) {
    echo $e->getCode();
    $mensaje = $e->getMessage();
    echo '<br>ERROR EN LA CONEXIÓN: ' . $mensaje;
    exit(); //Para cerrar la conexión
}

/*<?php
//Construye un programa PHP que conecte con la base de datos. 
//Parametros que pueden cambiar*/
/*$host = "localhost";
$usuario = "gestor";
$contrasena = "secreto";
$bd = "dwes_01_nba";
*//*
define("HOST", "localhost");
define("USERNAME", "gestor");
define("PASSWORD", "secreto");
define("DATABASE", "dwes_01_nba");

function getConexion()
{
    $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
    try {
        //Creación de la conexión con PDO
        $conexion = new PDO("mysql:host=" . HOST . ";dbname=" . USERNAME, USERNAME, PASSWORD, $opciones);
        //Configuración del modo de errores
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //Mensaje por si fue exitosa la conexión
        echo "Conexión establecida con la base de datos '".DATABASE."'<br>";
        return $conexion;
        
    } catch (PDOException $error) {
        echo $error->getCode();
        $mensaje = $error->getMessage();
        echo '<br>ERROR EN LA CONEXIÓN: ' . $mensaje;
        exit(); //Para cerrar la conexión
        return null;
    }
}*/