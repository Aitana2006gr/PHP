<?php
require_once("Pizza.php");
class baseDatos
{
    public static function obtienePizzas()
    {
        require_once("conexion.php");
        if (!isset($conexion)) {
            return NULL;
        }
        $pizzas = array();
        $resultado = $conexion->query("SELECT * FROM pizza");
        if ($resultado->rowCount()>0) {
            $row = $resultado->fetch(PDO::FETCH_ASSOC);
            while ($row) {
                $pizzas[] = new Pizza($row["codigo"], $row["descripcion"], $row["precio"], $row["tipo"]);
                $row = $resultado->fetch(PDO::FETCH_ASSOC);
            }
        }
        return $pizzas;
    }
}
?>