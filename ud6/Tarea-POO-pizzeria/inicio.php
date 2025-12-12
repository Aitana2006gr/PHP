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
    /*echo "<label for="frutas">Elige una fruta:</label>
    <select id="frutas" name="frutas">
    <option value="manzana">Manzana</option>
    <option value="banana">Banana</option>
    <option value="naranja">Naranja</option>
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