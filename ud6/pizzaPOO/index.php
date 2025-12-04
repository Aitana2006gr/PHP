<!DOCTYPE html>
<html lang="es">

<head id="encabezado">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INDEX PIZZA POO</title>
</head>

<body id="contenido">
    <h2>Listado de usuarios</h2>
    <?php
    require_once("clases/BaseDatos.php");
    require_once("funciones/salida.php");
    $pizzas=BaseDatos::obtienePizzas();
    mostrarPizzas($pizzas);
    
    ?>

</body>

<footer id="pie">
</footer>

</html>
