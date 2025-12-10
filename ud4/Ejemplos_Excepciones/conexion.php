<?php
//establecer conexion
$servidor = "localhost";
$db = "dwes";
$usuario = "dwes";
$pass = "abc123.";

	try
	{    
		$opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"); 
		$dwes = new PDO("mysql:host=$servidor;dbname=$db", $usuario, $pass, $opciones);
		$dwes->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		echo "Conexión realizada!";
	} 
	catch(PDOException $e) {
        $mensaje = $e->getMessage();
        echo "ERROR DE CONEXIÓN CON LA BASE DE DATOS:</br>";
        echo $mensaje;
		exit();
    }

?>