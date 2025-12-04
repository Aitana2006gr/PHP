<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>NBA</title>
</head>

<body>
    <?php require_once("conexionBD.php"); //Incluimos la conexión con la base de datos
    require_once("funcionesBD.php");
    $equipos = getEquipos($conexion);
    $selecionEquipo = $_POST["nombre"] ?? '';
    ?>

    <div id="encabezado">
        <h1>Jugadores de la NBA</h1>
        <form id="form_seleccion" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
            <label for="nombre">Selecciona un equipo:</label>
            <select name="nombre" id="nombre">
                <option value="">--Seleccione--</option>
                <?php foreach ($equipos as $equipo) : ?>
                    <option value="<?= htmlspecialchars($equipo) ?>" <?= $equipo === $selecionEquipo ? 'selected' : '' ?>>
                        <?= htmlspecialchars($equipo) ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <input type="submit" name="mostrarJugadores" value="Mostrar">
        </form>
    </div>
    <div id="contenido"><br>
        <h1>Tabla de nombres del equipo:</h1>
        <?php
        if (isset($_POST["mostrarJugadores"])) {
            if (!$conexion) {
                echo "<p>ERROR: No se pudo conectar con la base de datos 'dwes'</p>";
            } else {
                //Recibo los datos del formulario
                $nombreEquipo = $_POST["nombre"];
                //Comprobación por si hay campos vacíos
                if (empty($nombreEquipo)) {
                    echo "<p>ERROR: No se ha seleccionado un equipo</p>";
                } else {
                    $sql = "SELECT nombre FROM jugadores WHERE nombre_equipo = '$nombreEquipo' ORDER BY nombre";
                    $resultado = $conexion->query($sql);
                    if ($resultado) {
                        echo "<table border='1'> ";
                        echo "<tr><th>Nombre</th></tr>";
                        while ($fila = $resultado->fetch()) {
                            echo "<tr>";
                        echo "<td>" . htmlspecialchars($fila["nombre"]) . "</td>";
                        echo "</tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "ERROR: No se pudo obtener los equipos";
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