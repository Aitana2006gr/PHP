<?php
//Parametros de la conexión
define("DB_HOST","localhost");
define("DB_NAME","dwes");
define("DB_USER","gestor");
define("DB_PASSWORD","secreto");

//Función para conectar
function getConexion(){
    try{
        //Devuelvo la conexion a la BD como objeto
        return new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER,DB_PASSWORD);
    }catch (PDOException $e){
        echo "Error: No se ha podido conectar: "+$e->getMessage();
        return null;
    }
}
//Función para cerrar la conexión
function cerrarConexion(&$conexion){
    unset($conexion);
}

?>


