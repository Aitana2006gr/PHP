<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Tienda listado productos</title>
</head>

<body>
    <div id="encabezado">

        <h1>Listado de productos</h1>
        <form id="form_seleccion" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <span>Mostrar lista de productos: </span>
            <input type="submit" value="Mostrar lista" name="enviar" />
        </form>
    </div>
    <div id="contenido">
        <h2>Lista de los productos disponibles: </h2>
        <?php
        if (isset($_POST["enviar"])) { //Solo ejecuto si pulso el boton de mostrar lista
            $tienda = new PDO("mysql:host=localhost;dbname=tienda;charset=utf8", "gestor", "secreto");
            if (!$tienda) {
                echo "<p>ERROR: No se pudo conectar con la base de datos 'tienda'</p>";
            } else { //Hago uso del bloque de texto
                $sql = <<<SQL
						SELECT nombre, precio, descripcion
						FROM producto
						SQL;
                $resultado = $tienda->query($sql);
                if ($resultado) {
                    $fila = $resultado->fetch();
                    while ($fila != null) {
                        echo "<strong>Producto</strong><br>";
                        echo "Nombre: " . $fila["nombre"] . "<br>";
                        echo "Precio: " . $fila["precio"] . "<br>";
                        echo "Descripción: " . $fila["descripcion"] . "<br>";
                        $fila = $resultado->fetch();
                        echo "-----------------<br>";
                    }
                } else {
                    echo "<p>ERROR: No se ha podido ejecutar la consulta</p>";
                }
            }
        }
        ?>
    </div>
    <div id="pie">
        <?php
        unset($tienda);
        ?>
    </div>
</body>

</html>