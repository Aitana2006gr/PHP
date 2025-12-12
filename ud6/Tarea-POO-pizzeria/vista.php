<!DOCTYPE html>
<html lang="es">

<head id="encabezado">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INDEX PIZZA POO</title>
</head>

<body id="contenido">
    <?php
    require_once("");
    require_once("");
    $pizzas=BaseDatos::obtienePizzas();
    mostrarPizzas($pizzas);
    
    ?>

</body>

<footer id="pie">
</footer>

</html>