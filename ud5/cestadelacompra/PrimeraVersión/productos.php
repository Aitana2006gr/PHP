<?php
session_start();
//Pido el archivo una vez
require_once "_conexion.php";

//Compruebo para permitir el acceso
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

//Inicializo la cesta con un array
if (!isset($_SESSION['cesta'])) {
    $_SESSION['cesta'] = [];
}

//Para redirigir a las diferentes páginas
if (isset($_POST['desconectar'])) {
    header("Location: logoff.php");
    exit;
}
if (isset($_POST['vaciar'])) {
    $_SESSION['cesta'] = [];
    header("Location: productos.php");
    exit;
}
if (isset($_POST['comprar'])) {
    header("Location: cesta.php");
    exit;
}

//Para añadir producto a la cesta
if (isset($_POST['enviar']) && isset($_POST['codigo'])) {
    $codigo = $_POST['codigo'] ?? null;
    $nombre = $_POST['nombre'] ?? null;
    $precio = $_POST['precio'] ?? null;
    if ($codigo && $nombre && $precio) {
        $_SESSION['cesta'][] = [
            "codigo" => $codigo,
            "nombre" => $nombre,
            "precio" => (float)$precio
        ];
    }
    header("Location: productos.php");
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de productos</title>
    <link rel="stylesheet" href="./estilos/tienda.css">
</head>

<body>
    <div id="encabezado">
        <h1>Listado de productos</h1>
    </div>

    <div id="contenido">

        <div class="listado-productos">
            <?php
            if ($conexion) {
                try {
                    $resultado = $conexion->query("SELECT cod, nombre_corto, PVP FROM producto");
                    if ($resultado) {
                        while ($fila = $resultado->fetch()) { //Se recorre cada fila y se va añadiendo los productos 
                            echo "<div class='producto-linea'>";
                            echo "<form action='productos.php' method='post' style='display:inline;'>";
                            //Y con estos campos ocultos se envían los datos al script superior
                            echo "<input type='hidden' name='codigo' value='" . htmlspecialchars($fila['cod']) . "'>";
                            echo "<input type='hidden' name='nombre' value='" . htmlspecialchars($fila['nombre_corto']) . "'>";
                            echo "<input type='hidden' name='precio' value='" . htmlspecialchars($fila['PVP']) . "'>";
                            echo "<input type='submit' name='enviar' value='Añadir'>";
                            echo "<span>" . htmlspecialchars($fila['nombre_corto']) . ": " . number_format($fila['PVP'], 2, ',', '.') . " euros.</span>";
                            echo "</form>";
                            echo "</div>";
                        }
                    }
                } catch (PDOException $e) { //Captura los errores de la BD
                    //En la hoja de estilos tengo la clase de error porque tienen diferente color
                    echo "<p class='error'>Error al obtener productos: " . htmlspecialchars($e->getMessage()) . "</p>";
                }
            } else {
                echo "<p class='error'>Error: No se pudo conectar a la base de datos.</p>";
            }
            ?>
        </div>

        <div class="cesta-lateral">
            <div class="cesta-header">
                <!--Aquí coloco la imagen de la cesta-->
                <img src="imagenes/cesta.png" alt="Icono Cesta"> Cesta
            </div>

            <div class="cesta-contenido">
                <?php
                //Muestro los productos de la cesta
                if (count($_SESSION['cesta']) > 0) {
                    $total = 0;
                    echo "<ul>"; //Para comenzar la lista ya que me gusta que quede en ese formato, por eso también uso el li
                    foreach ($_SESSION['cesta'] as $producto) {
                        echo "<li>" . htmlspecialchars($producto['nombre']) . " (" . number_format($producto['precio'], 2, ',', '.') . " €)</li>";
                        $total += $producto['precio'];
                    }
                    echo "</ul>";
                    echo "<p style='text-align:center;'>Total: " . number_format($total, 2, ',', '.') . " €</p>";
                } else {
                    echo "<p style='text-align:center;'>Cesta vacía</p>";
                }
                ?>
            </div>
            <!--Formularios con los botones de vacias y comprar-->
            <form action="productos.php" method="post">
                <input type="submit" name="vaciar" value="Vaciar Cesta">
            </form>
            <form action="productos.php" method="post">
                <input type="submit" name="comprar" value="Comprar">
            </form>
        </div>
    </div>
    <footer id="pie">
        <!--Formulario para cerrar sesión-->
        <p><strong>Usuario conectado:</strong><?php echo htmlspecialchars($_SESSION['usuario']); ?></p>
        <form action="productos.php" method="post" style="display:inline;">
            <input type="submit" name="desconectar" value="Cerrar sesión">
        </form>
    </footer>
</body>

</html>