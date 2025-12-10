<?php
//Sesión y control de acceso
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

if (isset($_SESSION['cesta'])) {
    unset($_SESSION['cesta']);
}

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
    <title>Pagar</title>
    <link rel="stylesheet" href="./estilos/tienda.css">
</head>

<body>
    <div id="encabezado">
        <h1>Simulación de pago</h1>
    </div>

    <div id="contenido" style="display: block;">
        <h2>Transacción Finalizada</h2>
        <h3>¡Gracias por su compra!</h3>
        <p>El proceso de pago ha finalizado. Puede iniciar una nueva compra.</p>

        <p>¿Quiere comenzar de nuevo? <a href="productos.php">Volver a la tienda</a></p>
    </div>

    <footer id="pie">
        <!--Formulario para salir de la sesión-->
        <p><strong>Usuario conectado: </strong><?php echo htmlspecialchars($_SESSION['usuario']); ?></p>
        <form action="pagar.php" method="post" >
            <input type="submit" name="desconectar" value="Cerrar sesión">
        </form>
    </footer>

</html>