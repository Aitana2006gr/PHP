<?php
session_start();

require_once __DIR__ . '/../clases/Cesta.php';

//Compruebo el usuario de la sesión
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

//Creo un objeto Cesta
$cesta = new Cesta();

//Si presiono el botón pagar, me redirige a esa página
if (isset($_POST['pagar'])) {
    header("Location: pagar.php");
    exit();
}

//Si presiono el botón desconectar, me redirige a la página logoff
if (isset($_POST['desconectar'])) {
    header("Location: logoff.php");
    exit();
}

//Calculamos si cesta vacía y total (mantenemos variables originales)
$cesta_vacia = empty($cesta->getProductos());
$total_compra = $cesta->calcularTotal();
?>

<!--Misma parte visual que en la verisión normal-->
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cesta de la compra</title>
    <link rel="stylesheet" href="../estilos/tienda.css">
</head>

<body>
    <div id="encabezado">
        <h1>Cesta de la compra</h1>
    </div>

    <div id="contenido" style="display: block;">
        <h2>Resumen de la compra</h2>

        <?php if ($cesta_vacia) { ?>
            <p>Tu cesta de la compra está vacía <a href="productos.php">Volver a productos</a></p>
        <?php } else { ?>

            <table>
                <thead>
                    <tr>
                        <th>CÓDIGO</th>
                        <th>DESCRIPCIÓN</th>
                        <th>PRECIO (€)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($cesta->getProductos() as $producto) { ?>
                        <tr>
                            <td><?php echo htmlspecialchars($producto->getCod()); ?></td>
                            <td><?php echo htmlspecialchars($producto->getNombre()); ?></td>
                            <td><?php
                                echo number_format($producto->getPrecio(), 2, ',', '.');
                                ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2" style="text-align: right;">Precio total:</td>
                        <td><?php echo number_format($total_compra, 2, ',', '.') . " €"; ?></td>
                    </tr>
                </tfoot>
            </table>

            <form id="form_seleccion" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <fieldset>
                    <input type="submit" name="pagar" value="Pagar">
                </fieldset>
            </form>
        <?php } ?>
    </div>

    <footer id="pie">
        <p><strong>Usuario conectado:</strong> <?php echo htmlspecialchars($_SESSION['usuario']); ?></p>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <input type="submit" name="desconectar" value="Cerrar sesión">
        </form>
    </footer>

</html>
