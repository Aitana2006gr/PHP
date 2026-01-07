<?php
//Clase que muestra el detalle del pedido
session_start();
include_once 'funciones.php';

//Si se pulsó el botón calcular
if (isset($_POST['calcular'])) {
        $_SESSION['numeroPedido'] = $_POST['numeroPedido'];
        $_SESSION['nombre'] = $_POST['nombre'];
        $_SESSION['precio'] = $_POST['precio'];
        $_SESSION['categoria'] = $_POST['categoria'];
        $_SESSION['cantidad'] = $_POST['cantidad'];
        //Si no existe la lista de productos, se inicializa
        if (!isset($_SESSION["lista"])) {
            $_SESSION["lista"] = array();
        }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Resultado Pedido</title>
    </head>
    <body>
        <?php
        echo "<h2>Detalle del Pedido Nº" .$_SESSION['numeroPedido'] ."</h2>";
        echo "Producto: " . $_SESSION['nombre'] . "<br>";
        echo "Categoría: " . $_SESSION['categoria'] . "<br>";
        echo "Precio unitario: " . $_SESSION['precio'] . "<br>";
        echo "Cantidad: " . $_SESSION['cantidad'] . "<br><br>";
		echo "<h3>Cálculos</h3>";

		$_SESSION['totalAcumulado']=calcularImporteTotal();
        echo "Total del pedido: " . $_SESSION['totalAcumulado'] . "<br>";
        ?>

        <form action="pedido.php" method="POST">
			<input type="submit" value="Modificar" name="modificar"/>
			<input type="submit" value="Otro Pedido" name="otro"/>
		</form>
		<br/>
    </body>
</html>
