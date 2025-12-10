<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Aplicar descuento a productos</title>
</head>

<body>
     <h1>Ejercicio: DWES</h1>
    <h2>Listado de productos</h2>
    <?php
    require("conexion.php");

    if (!$conexion) {
        echo "<p>ERROR: No se pudo conectar con la base de datos 'dwes'</p>";
    } else {

        // Si se ha pulsado el botón "Descuento"
        if (isset($_POST["aplicar_descuento"])) {
            $codigo = $_POST["codigo"];
            // Aplicamos el descuento del 10%
            try {
                $sql_descuento = "UPDATE producto SET PVP = PVP * 0.9 WHERE cod = :codigo"; //El :codigo es un marcador de posición que luego se sustituye por el valor real de la variable $codigo
                $sentencia = $conexion->prepare($sql_descuento);
                $sentencia->execute([":codigo" => $codigo]);
                echo "<p>Descuento aplicado al producto con código <strong>$codigo</strong>.</p>";
            } catch (PDOException $e) {
                echo "<p>ERROR al aplicar el descuento: " . $e->getMessage() . "</p>";
            }
        }

        //Mostrar todos los productos
        $sql = "SELECT p.cod, p.nombre_corto, p.PVP, p.familia AS cod_familia
                FROM producto p
                ORDER BY p.cod";
        $resultado = $conexion->query($sql);

        if ($resultado) {
            echo "<table border='1'>";
            echo "<tr><th>Familia (cod)</th><th>Código</th><th>Nombre producto</th><th>Precio</th><th>Aplicar descuento</th></tr>";

            while ($fila = $resultado->fetch()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($fila["cod_familia"]) . "</td>";
                echo "<td>" . htmlspecialchars($fila["cod"]) . "</td>";
                echo "<td>" . htmlspecialchars($fila["nombre_corto"]) . "</td>";
                echo "<td>" . number_format($fila["PVP"], 2, ',', '.') . "</td>";
                echo "<td>";
                //Solo mostrar botón si el precio es mayor de 100
                if ($fila["PVP"] > 100) {
                    echo '<form method="post" action="' . $_SERVER["PHP_SELF"] . '">';
                    echo '<input type="hidden" name="codigo" value="' . htmlspecialchars($fila["cod"]) . '">';
                    echo '<input type="submit" name="aplicar_descuento" value="Descuento">';
                    echo '</form>';
                } else {
                    echo '-';
                }
                echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>ERROR: No se pudieron obtener los productos.</p>";
        }
    }

    unset($conexion);
    ?>

</body>

</html>
