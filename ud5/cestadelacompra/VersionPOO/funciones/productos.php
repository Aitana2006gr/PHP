<?php
session_start();

require_once __DIR__ . '/../clases/BD.php';
require_once __DIR__ . '/../clases/Cesta.php';
require_once __DIR__ . '/../clases/Producto.php';

//Comprobar acceso
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

//Inicializar cesta
$cesta = new Cesta();

//Botones: desconectar, vaciar, comprar
if (isset($_POST['desconectar'])) {
    header("Location: logoff.php");
    exit;
}
if (isset($_POST['vaciar'])) {
    $cesta->vaciar();
    header("Location: productos.php");
    exit;
}
if (isset($_POST['comprar'])) {
    header("Location: cesta.php");
    exit;
}

//Para añadir producto a la cesta (mantenemos nombres de campos originales)
if (isset($_POST['enviar']) && isset($_POST['codigo'])) {
    //Recogo los campos del formulario POST
    $codigo = $_POST['codigo'] ?? null; //Asigno null si no está
    $nombre = $_POST['nombre'] ?? null;
    $precio = isset($_POST['precio']) ? $_POST['precio'] : null; //Lo recogo verificando si esta definido
    //Compruebo los datos que sean distinto a null
    if ($codigo && $nombre && $precio !== null) {
        //Creo un nuevo producto
        $producto = new Producto($codigo, $nombre, $precio);
        //Añado usando la clase Cesta
        $cesta->anadirProducto($producto);
    }
    //Redirecciono
    header("Location: productos.php");
    exit;
}

//Obtener productos desde la BD
$productos = BD::obtener_productos();
?>

<!--Misma parte visual que en la verisión normal-->
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Listado de productos</title>
    <link rel="stylesheet" href="../estilos/tienda.css">
</head>
<body>
    <div id="encabezado">
        <h1>Listado de productos</h1>
    </div>

    <div id="contenido">

        <div class="listado-productos">
            <?php
            if (!empty($productos)) {
                foreach ($productos as $fila) {
                    echo "<div class='producto-linea'>";
                    echo "<form action='productos.php' method='post' style='display:inline;'>";
                    echo "<input type='hidden' name='codigo' value='" . htmlspecialchars($fila->getCod()) . "'>";
                    echo "<input type='hidden' name='nombre' value='" . htmlspecialchars($fila->getNombre()) . "'>";
                    echo "<input type='hidden' name='precio' value='" . htmlspecialchars($fila->getPrecio()) . "'>";
                    echo "<input type='submit' name='enviar' value='Añadir'>";
                    echo "<span>" . htmlspecialchars($fila->getNombre()) . ": " . number_format($fila->getPrecio(), 2, ',', '.') . " euros.</span>";
                    echo "</form>";
                    echo "</div>";
                }
            } else {
                echo "<p class='error'>No hay productos para mostrar.</p>";
            }
            ?>
        </div>

        <div class="cesta-lateral">
            <div class="cesta-header">
                <img src="../imagenes/cesta.png" alt="Icono Cesta"> Cesta
            </div>

            <div class="cesta-contenido">
                <?php
                //Aquí uso el mismo formato que antes 
                echo $cesta->mostrarHtml();
                ?>
            </div>

            <form action="productos.php" method="post">
                <input type="submit" name="vaciar" value="Vaciar Cesta">
            </form>
            <form action="productos.php" method="post">
                <input type="submit" name="comprar" value="Comprar">
            </form>
        </div>
    </div>

    <footer id="pie">
        <p><strong>Usuario conectado:</strong><?php echo htmlspecialchars($_SESSION['usuario']); ?></p>
        <form action="productos.php" method="post" style="display:inline;">
            <input type="submit" name="desconectar" value="Cerrar sesión">
        </form>
    </footer>
</body>
</html>
