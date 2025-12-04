<!DOCTYPE html>
<html>

<head>
    <title>Ejercicios Tipos de Datos</title>
</head>

<body>
    <h2>Tipos de Datos. Actividad 2.2</h2>
    <h3>Ejercicio 5</h3>

    <?php
    /*5. Variables por referencia:
    o Declara $producto = "Laptop" y $categoria = "Electrónicos".
    o Declara $refProducto como referencia a $producto y $refCategoria
    como referencia a $categoria.
    o Cambia $producto a "Smartphone" y $categoria a "Móviles".
    o Muestra los valores de $refProducto y $refCategoria.
    o Explica brevemente qué sucede con las referencias cuando cambias las
    variables originales.*/

    $producto="Laptop";
    $categoria="Electrónicos";

    $refProducto=&$producto;
    $refCategoria=&$categoria;
    echo "Inicialmente las variables son estas:<br>";
    echo "Producto: ".$refProducto ."<br>";
    echo "Categoria: ".$refCategoria."<br><br>";

    echo "Después de cambiar las variables: <br>";
    $producto="Smartphone";
    $categoria="Móviles";
    echo "Producto: ".$refProducto ."<br>";
    echo "Categoria: ".$refCategoria."<br><br>";
    echo "Las referencias son enlaces a la dirección de memoria de la variable referenciada.
    Ellas no contienen el valor y se usa el & para indicarlas";
    ?>
</body>

</html>