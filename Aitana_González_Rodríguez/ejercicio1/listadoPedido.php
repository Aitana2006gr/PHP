<?php
//Clase que muestra el procesamiento de un pedido
session_start();
include_once "funciones.php";
?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Listado Pedido</title>
</head>

<body>
    <div>
        <?php

        //Cuando pulsamos el botón cerrar nos muestra la lista de los pedidos registrados
        if (isset($_POST['cerrar'])) {
            if (!empty($_SESSION['lista'])) {
                echo "<h2> Listado de Pedidos Registrados </h2>";
                echo "<table>";
                echo "<tr><th>Producto</th><th>Cantidad</th><th>Total</th></tr>";
                foreach ($_SESSION['lista'] as $clave => $valor) {
                    echo "<tr>";
                    echo "<td>" . $valor . "</td>";
                    echo "</tr>";
                }
                echo "<tr>";
                echo "<td>" . "TOTAL ACUMULADO:" . $_SESSION['totalAcumulado'] . "</td>";
                echo "</tr>";
                echo "<form action='pedido.php' method='POST'>";
                echo "<input type='submit' value='Volver a iniciar' name='volverIniciar'/>";
                echo "</form>";
            } else {
                echo "<h3>No hay ningún dato a mostrar</h4>";
            }
            cerrarSesion();

            //Redirigir a pedido.php
            if (isset($_POST['volverIniciar'])) {
                echo "<br><br><br>Volvemos a pedido.php......";
                header("refresh:2;url=pedido.php");
            }
        }
        ?>

    </div>
</body>

</html>