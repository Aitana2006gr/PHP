<?php 
define('DB_HOST', 'localhost');
define('DB_NAME', 'dwes');
define('DB_USER', 'gestor');
define('DB_PASSWORD', 'secreto');

function getConexion() {
    try {
        return new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
    } catch (PDOException $e) {
        echo "Error: No se ha podido conectar: "+$e->getMessage();
        return null;
    }
}

function closeConexion(&$conexion) {
    unset($conexion);
}
?>