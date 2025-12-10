<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Tienda Eliminar Cliente</title>
</head>

<body>
    <div id="encabezado">

        <h1>Eliminar Cliente</h1>
        <form id="form_seleccion" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <span>
                <h4>Formulario para eliminar un cliente:</h4>
            </span>
            <p>NIF: <input type="text" name="nif" required></p>
            <input type="submit" name="eliminar" value="Eliminar Cliente">
        </form>
    </div>
    <div id="contenido">
        <?php
        if (isset($_POST["eliminar"])) {
            $tienda = new PDO("mysql:host=localhost;dbname=tienda;charset=utf8", "gestor", "secreto");

            if (!$tienda) {
                echo "<p>ERROR: No se pudo conectar con la base de datos 'tienda'</p>";
            } else { //Hago uso del bloque de texto
                //Recibo los datos del formulario del dato nif
                $nif = $_POST["nif"];

                //Comprobación por si está el campo vacío
                if (empty($nif)) {
                    echo "<p>ERROR: Debes introducir el nif del cliente a eliminar. El campo es OBLIGATORIO</p>";

                    // Validar longitud del campo según la tabla que fue creada en la base de datos
                } else if (strlen($nif) > 9) {
                    echo "<p>ERROR: El campo 'nif' supera la longitud máxima permitida</p>";
                } else {
                    //Se busca el nif del cliente para hacer la cliente
                    $sql = <<<SQL
						SELECT * FROM cliente WHERE nif='$nif';
						SQL;

                    $resultado = $tienda->query($sql); //ES una CONSULTA

                    if ($resultado && $resultado->rowCount() > 0) {

                        //Si el resultado de la consulta y el nif del formulario coinciden, el cliente existente, se elimina
                        $sql = <<<SQL
                        DELETE FROM cliente WHERE nif = '$nif';
                        SQL;
                        $borrado = $tienda->exec($sql); //ES una EJECUCIÓN porque elimina algo de la tabla

                        if ($borrado > 0) {
                            echo "<p>El cliente con NIF ($nif) ha sido eliminado correctamente</p>";
                        } else {
                            echo "<p>ERROR: No se ha podido eliminar el cliente</p>";
                        }
                    } else {
                        echo "<p>ERROR: No existe ningún cliente con ese NIF</p>";
                    }
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