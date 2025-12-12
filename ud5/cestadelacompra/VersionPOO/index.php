<?php
//Inicia o continua la sesión
session_start();
?>
<!--Index-->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Index POO</title>
</head>
<body>
    <h1>INDEX - Tienda </h1>
<!--Esto se ve si no tienes la sesion iniciada-->
    <?php if (!isset($_SESSION['usuario'])){ ?>
        <p><a href="funciones/login.php">Iniciar sesión</a></p>
    <?php }else{ ?>
        <!--Esto se ve si ya iniciaste sesión, puedes acceder pero desde aquí también-->
        <p>Usuario: <strong><?= htmlspecialchars($_SESSION['usuario']) ?></strong></p>
        <ul>
            <li><a href="funciones/productos.php">Productos</a></li>
            <li><a href="funciones/cesta.php">Ver cesta</a></li>
            <li><a href="funciones/pagar.php">Pagar</a></li>
            <li><a href="funciones/logoff.php">Cerrar sesión</a></li>
        </ul>
    <?php } ?>

</body>
</html>
