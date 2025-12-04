<?php
require_once("conexionBD.php");
echo "<h2>Tabla Equipos</h2>";
function VerTablaEquipos($conexion) {
    try {
            $sql = "SELECT * FROM equipos  ORDER BY nombre"; //Selecciono todo
            $resultado = $conexion->query($sql);

            if ($resultado) {
                echo "<table border='1'> ";
                echo "<tr><th>Nombre</th><th>Ciudad</th><th>Conferencia</th><th>Division</th></tr>";
                while ($fila = $resultado->fetch()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($fila["nombre"]) . "</td>";
                    echo "<td>" . htmlspecialchars($fila["ciudad"]) . "</td>";
                    echo "<td>" . htmlspecialchars($fila["conferencia"]) . "</td>";
                    echo "<td>" . htmlspecialchars($fila["division"]) . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<p>ERROR: No se pudo obtener el equipo</p>";
            }
        } catch (PDOException $error) {
            echo "<p>ERROR: No se pudo crear la tabla: " . $error->getMessage() . "<p>";
            exit();
        }
}
/*
function getEquiposconTabla($conexion) {
    $nombreEquipos=[];
    try {
            $sql = "SELECT nombre FROM equipos ORDER BY nombre"; //Selecciono todo
            $resultado = $conexion->query($sql);

            if ($resultado) {
                echo "<table border='1'> ";
                echo "<tr><th>Nombre</th></tr>";
                while ($fila = $resultado->fetch()) {

                    $nombreEquipos[]=$fila["nombre"];
                    //Muestro por pantalla los nombres
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($fila["nombre"]) . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<p>ERROR: No se pudo obtener el nombre del equipo</p>";
            }
        } catch (PDOException $error) {
            echo "<p>ERROR: No se pudo listar los nombres de los equipos: " . $error->getMessage() . "<p>";
            exit();
        }
    return $nombreEquipos;
}*/
function getEquipos($conexion) {
    $nombreEquipos=[];
    try {
            $sql = "SELECT nombre FROM equipos ORDER BY nombre"; //Selecciono todo
            $resultado = $conexion->query($sql);

            if ($resultado) {
                while ($fila = $resultado->fetch()) {
                    //Añado el nombre al array de nombreEquipos
                    $nombreEquipos[]=$fila["nombre"];
                }
            } else {
                echo "<p>ERROR: No se pudo obtener el nombre del equipo</p>";
            }
        } catch (PDOException $error) {
            echo "<p>ERROR: No se pudo obtener los nombres de los equipos: " . $error->getMessage() . "<p>";
            exit();
        }
    return $nombreEquipos;
}

VerTablaEquipos($conexion);
//echo "<h2>Nombres de los Equipos</h2>";
//getEquipos($conexion);
?>
