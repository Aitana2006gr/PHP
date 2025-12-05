<?php
//Inicio de sesión 
session_start();

//Compruebo el usuario de la sesión, si la variable de sesión no está definida
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php"); //Se redirige a la página de login
    exit();  //Y se detiene la ejecución
}

//Inicializo variable para acumular el precio de la compra total
$total_compra = 0.0;
//Compruebo si el array esta vacío
$cesta_vacia = empty($_SESSION['cesta']);

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
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cesta de la compra</title>
    <link rel="stylesheet" href="./estilos/tienda.css">
</head>

<body>
    <div id="encabezado">
        <h1>Cesta de la compra</h1>
    </div>

    <div id="contenido" style="display: block;">
        <h2>Resumen de la compra</h2>

        <?php if ($cesta_vacia) { // Si la cesta esta vacía, se vuelve a los productos
        ?>
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
                    <?php //Recorro cada producto del array sesión cesta
                    foreach ($_SESSION['cesta'] as $producto) { ?>
                        <tr><!--Uso el htmlspacialchars para evitar inyecciones-->
                            <td><?php echo htmlspecialchars($producto['codigo']); ?></td>
                            <td><?php echo htmlspecialchars($producto['nombre']); ?></td>
                            <td><?php
                                echo number_format($producto['precio'], 2, ',', '.');
                                $total_compra += $producto['precio'];
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

            <form id="form_seleccion" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <fieldset>
                    <input type="submit" name="pagar" value="Pagar">
                </fieldset>
            </form>
        <?php } ?>
    </div>

    <footer id="pie">
        <!--Formulario para cerrar sesión y se ve el usuario que tiene la sesión activa-->
        <p><strong>Usuario conectado:</strong> <?php echo htmlspecialchars($_SESSION['usuario']); ?></p>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <input type="submit" name="desconectar" value="Cerrar sesión">
        </form>
    </footer>

</html>