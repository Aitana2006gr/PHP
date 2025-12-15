<!DOCTYPE html>
<html lang="es">

<head id="encabezado">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio pizzeria-online</title>
</head>

<body id="contenido">
    <h2>SISTEMA DE SELECCIÓN DE MENU ON-LINE</h2>
    <hr>
    <?php
    echo "<p>Numero de pedido:</p>";
    ?>
    <hr>
    <?php
    /*echo "<label for="frutas">Selecciona la forma de pago:</label>
    <select id="formaPago" name="Método de pago">
    <option value="Contado">Contado</option>
    <option value="MasterCard">VISA</option>
    <option value="Ame">Naranja</option>
    <option value="Ame">Naranja</option>
    </select>"
    */
    //index-controlador
    require_once("");
    require_once("");
    $pizzas = BaseDatos::obtienePizzas();
    mostrarPizzas($pizzas);
    $pedidos= BaseDatos::obtienePedidos();
    mostrarPedidos($pedidos);

    ?>

</body>

<footer id="pie">
</footer>

</html>