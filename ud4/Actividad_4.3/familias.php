<!DOCTYPE html>
<!--Crear un programa PHP con un formulario para introducir la fecha de una película y que nos devuelva sus datos.-->
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Ejercicio familias.php</title>
</head>

<body>
    <div id="encabezado">

        <h1>Ejercicio: Obtención de productos de una familia</h1>
        <form id="form_seleccion" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <!--Tengo que meter para la select PHP-->
            <?php
            require("conexion.php");
            if (!$conexion) {
                echo "<p>ERROR: No se pudo conectar con la base de datos 'goyas'</p>";
            } else {
                echo "Familia: ";
                echo '<select name="familia">';
                //echo '<option value="..."</option>';
                $sql = "SELECT * FROM familia";
                $resultado = $conexion->query($sql);
                if ($resultado) {
                    while ($fila = $resultado->fetch()) {
                        echo '<option value="' . $fila["cod"] . '">' . $fila["nombre"] . '</option>';
                    }
                } else {
                    echo "ERROR: No se pudo obtener la familia";
                }
            }
            ?>
            <input type="submit" name="mostrarProductos" value="Mostrar Productos">
        </form>
    </div>
    <div id="contenido"><br>
            <h1>Productos de la Familia seleccionada:</h1>
        <?php
        if (isset($_POST["mostrarProductos"])) {
            require("conexion.php"); //Incluimos la conexión con la base de datos

            if (!$conexion) {
                echo "<p>ERROR: No se pudo conectar con la base de datos 'dwes'</p>";
            } else {
                //Recibo los datos del formulario
                $familia = $_POST["familia"];
                //Comprobación por si hay campos vacíos
                if (empty($familia)) {
                    echo "<p>ERROR: No se ha seleccionado una familia</p>";
                } else {
                    //$sql= "SELECT * FROM producto ORDER by nombre";
                    $sql = "SELECT * FROM producto WHERE familia = '$familia'";
                    $resultado = $conexion->query($sql);
                    if ($resultado) {
                        while ($fila = $resultado->fetch()) {
                            echo '['.$fila["cod"].'] '.$fila["nombre_corto"].' -> Precio: '.$fila["PVP"];
                            echo "<br>";
                        }
                    } else {
                        echo "ERROR: No se pudo obtener los productos de la familia";
                    }
                }
            }
        }

        ?>
    </div>
    <div id="pie">
        <?php
        unset($conexion);
        ?>
    </div>
</body>

</html>