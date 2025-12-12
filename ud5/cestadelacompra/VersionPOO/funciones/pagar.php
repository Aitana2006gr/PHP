<?php
session_start();
require_once __DIR__ . '/../clases/Cesta.php';

//Compruebo si esta la sesión de usuario
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

//Creo un objeto Cesta
$cesta = new Cesta();

//Vacio la cesta
$cesta->vaciar();

//Si se pulsa desconectar, redirige a logoff
if (isset($_POST['desconectar'])) {
    header("Location: logoff.php");
    exit();
}
?>

<!--Misma parte visual que en la verisión normal-->
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Pagar</title>
    <link rel="stylesheet" href="../estilos/tienda.css">
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
        <p><strong>Usuario conectado: </strong><?php echo htmlspecialchars($_SESSION['usuario']); ?></p>
        <form action="pagar.php" method="post" >
            <input type="submit" name="desconectar" value="Cerrar sesión">
        </form>
    </footer>

</html>
