<?php
require_once __DIR__ . '/_conexion.php';
require_once __DIR__ . '/Producto.php';
require_once __DIR__ . '/Usuario.php';

class BD
{
    //Obtiene todos los productos
    public static function obtener_productos()
    {
        global $conexion;
        $productos = [];

        if (!isset($conexion)) {
            return $productos; //El array se devuelve vacío si no hay conexion
        }

        try {
            $resultado = $conexion->query("SELECT cod, nombre_corto, PVP FROM producto");
            while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
                $productos[] = new Producto($fila['cod'], $fila['nombre_corto'], $fila['PVP']);
            }
        } catch (PDOException $e) {
            //Devolvemos nulo si hay error
            return null;
        }

        return $productos;
    }

    //consulta_usuarios devuelve true si existe usuario con MD5(password)
    public static function consulta_usuarios($usuario, $password)
    {
        global $conexion;
        if (!isset($conexion)) {
            return false;
        }
        //Sentencias preparadas
        $sql = "SELECT usuario FROM usuarios WHERE usuario = :usuario AND contrasena = MD5(:password)";
        $sentencia = $conexion->prepare($sql);
        $sentencia->execute([":usuario" => $usuario, ":password" => $password]);

        return $sentencia->fetch() ? true : false; //operario ternario
    }
}
