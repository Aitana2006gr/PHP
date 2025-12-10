<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="css/estilo.css"/>
    </head>
    <body>
        <?php
        if (isset($_REQUEST['fin'])) {
            session_start();
            echo "Muchas Gracias.";
            session_destroy();
            header("refresh:1;url='pedido.php'");
        }

        if (isset($_GET["c"])) {
            session_start();
            $plato = $_GET["c"];
            if (!isset($_SESSION["total"])) {
                $_SESSION["total"] = 0;
            }
            if (!isset($_SESSION["listaCompras"])) {
                $_SESSION["listaCompras"] = [];
            }
            if ($_SESSION["descuento"] == $plato) {
                $importePlatoSeleccionado = $_SESSION["platos"][$plato] * 0.9;
            } else {
                $importePlatoSeleccionado = $_SESSION["platos"][$plato];
            }
            array_push($_SESSION["listaCompras"], $plato);           
			echo "<div id='compra'>Ha elegido: <br>";
            echo "<img src='img/" . $plato . ".jpg'/>";
            echo "<p>Precio: " . $importePlatoSeleccionado . " &euro;</p><br>";
           
		   $_SESSION["total"] += $importePlatoSeleccionado;
			echo "<h2>Cesta de la compra:</h2>";
			foreach ($_SESSION["listaCompras"] as $plato)
				echo "<img src='img/" . $plato . ".jpg'/> ";
            echo "<br>";
			echo "<b>Total: " . $_SESSION["total"] . " &euro;</b><br>";
            echo "<a href='pedido.php'>Seguir comprando</a><br>";
            echo "<a href='importe.php?fin=true'>Finalizar</a>";
            echo "</div>";
        }
        ?>
    </body>
</html>

