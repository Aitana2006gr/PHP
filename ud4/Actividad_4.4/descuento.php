<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Aplicar descuento a productos</title>
</head>

<body>
    <h1>Ejercicio: DWES</h1>
    <h2>Listado de productos</h2>
<!---->
    <?php
    require("conexion.php");
    function mostrarProductos($conexion)
        {
            $sql = "SELECT cod, nombre_corto, PVP, familia FROM producto ORDER BY cod";
            $resultado = $conexion->query($sql);

            if ($resultado) {
                echo "<table>";
                echo "<tr><th>Familia</th><th>Código</th><th>Nombre producto</th><th>Precio</th></tr>";

                while ($fila = $resultado->fetch()) {
                    echo "<tr>";
                    echo "<td>" . $fila["familia"]. "</td>";
                    echo "<td>" . $fila["cod"] . "</td>";
                    echo "<td>" . $fila["nombre_corto"] . "</td>";
                    echo "<td>" . number_format($fila["PVP"], 2, ',', '.') . "</td>"; //number_format para los decimales y cambio de comas y puntos
                    echo "<td>"; //La creo para el boton
                    //Solo aparece el botón si el precio es mayor a 100
                    if ($fila["PVP"] > 100) {
                        //Coloco el formulario aquí para que aparezca el botón cada vez
                        echo '<form method="post" action="' . $_SERVER["PHP_SELF"] . '">';
                        echo '<input type="hidden" name="codigo" value="' . $fila["cod"] . '">';
                        echo '<input type="submit" name="botonDescuento" value="Descuento">';
                        echo '</form>';
                    } else {
                        echo "Sin descuento";
                    }
                    echo "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<p>ERROR: No se pudieron obtener los productos.</p>";
            }
        }

    if (!$conexion) { //Compruebo que haya conexion con la base de datos
        echo "<p>ERROR: No se pudo conectar con la base de datos 'dwes'</p>";
    } else {
        //Si pulso el botón botonDescuento
        if (isset($_POST["botonDescuento"])) { //En el boton también se deberia comprobar si es mayor que 100
            $codigo = $_POST["codigo"];
            //Aplico el descuento con un UPDATE
            try {
                $sql_descuento = "UPDATE producto SET PVP = PVP * 0.9 WHERE cod = :codigo"; //where cod='{$_POST["producto"]'}
                //El :codigo es un marcador de posición que luego se sustituye por el valor real de la variable $codigo
                $sentencia = $conexion->prepare($sql_descuento); //Sentencia preparada
                $sentencia->execute([":codigo" => $codigo]);
                echo "<p>Descuento aplicado al producto con código $codigo.</p>";
            } catch (PDOException $e) {
                echo "<p>ERROR al aplicar el descuento: " . $e->getMessage() . "</p>";
            }
        }
        mostrarProductos($conexion);
    }
    unset($conexion);
    ?>

</body>

</html>
