<!DOCTYPE html>
<!--Crear un programa PHP con un formulario para introducir la fecha de una película y que nos devuelva sus datos.-->
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Formulario buscar una película por su fecha (año)</title>
</head>

<body>
    <div id="encabezado">

        <h1>Buscar una película</h1>
        <form id="form_seleccion" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <span>
                <h3>Formulario para buscar por fecha:</h3>
            </span>
            <p>Fecha(Año): <input type="text" name="fecha" required></p>
            <input type="submit" name="buscar" value="Buscar Película">
        </form>
    </div>
    <div id="contenido"><br>
        <?php
        if (isset($_POST["buscar"])) {
            include("conexion.php"); //Incluimos la conexión con la base de datos

            if (!$conexion) {
                echo "<p>ERROR: No se pudo conectar con la base de datos 'goyas'</p>";
            } else {
                //Recibo los datos del formulario
                $fecha = $_POST["fecha"];
                //Comprobación por si hay campos vacíos
                if (empty($fecha)) {
                    echo "<p>ERROR: La fecha esta vacía</p>";
                } else {
                    echo "<h3>DATOS DE LA PELÍCULA</h3>";
                    $sql = "SELECT * FROM pelicula WHERE fecha=$fecha";
                    //$sql = "SELECT * FROM pelicula INNER JOIN director ON pelicula.director = director.codDirector WHERE fecha=$fecha";
        
                    $resultado = $conexion->query($sql);
                    if ($resultado) {
                        while ($fila = $resultado->fetch()) {
                            echo "Titulo: " . $fila["titulo"] . "</br>";
                            echo "Fecha: " . $fila["fecha"] . "</br>";
                            echo "Género: " . $fila["genero"] . "</br>";
                            echo "NºGoyas : " . $fila["numGoyas"] . "</br>";
                            echo "Director: " . $fila["director"] . "</br>";
                        }
                    }else{
                        echo "ERROR: No se pudo obtener la película";
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