<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Tienda Insertar Cliente Nuevo</title>
</head>

<body>
    <div id="encabezado">

        <h1>Insertar Cliente Nuevo</h1>
        <form id="form_seleccion" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <span>
                <h4>Formulario para añadir un cliente nuevo:</h4>
            </span>
            <p>NIF: <input type="text" name="nif" required></p>
            <p>Nombre: <input type="text" name="nombre" required></p>
            <p>Dirección: <input type="text" name="direccion" required></p>
            <p>Email: <input type="email" name="email" required></p>
            <p>Teléfono: <input type="tel" name="telefono" required></p>
            <p>Saldo: <input type="number" name="saldo" required></p>
            <input type="submit" name="insertar" value="Insertar Cliente">
        </form>
    </div>
    <div id="contenido">
        <?php
        if (isset($_POST["insertar"])) {
            $tienda = new PDO("mysql:host=localhost;dbname=tienda;charset=utf8", "gestor", "secreto");

            if (!$tienda) {
                echo "<p>ERROR: No se pudo conectar con la base de datos 'tienda'</p>";
            } else { //Hago uso del bloque de texto
                //Recibo los datos del formulario
                $nif = $_POST["nif"];
                $nombre = $_POST['nombre'];
                $direccion = $_POST['direccion'];
                $email = $_POST['email'];
                $telefono = $_POST['telefono'];
                $saldo = $_POST['saldo'];

                //Comprobación por si hay campos vacíos
                if (empty($nif) || empty($nombre) || empty($direccion) || empty($email) || empty($telefono) || empty($saldo)) {
                    echo "<p>ERROR: Los campos están vacíos, no se ha podido insertar los valores. Todos los campos son OBLIGATORIOS.</p>";
                    // Validar longitud de campos según la tabla que fue creada en la base de datos
                } else if (strlen($nif) > 9 || strlen($nombre) > 25 || strlen($direccion) > 40 || strlen($email) > 40 || strlen($telefono) > 15) {
                    echo "<p>ERROR: Alguno de los campos supera la longitud máxima permitida.</p>";
                } else {
                    //Se insertan los datos si estan completos
                    $sql = <<<SQL
						INSERT INTO cliente (nif, nombre, direccion, email, telefono, saldo) VALUES ('$nif', '$nombre', '$direccion', '$email', '$telefono', $saldo);
						SQL;

                    $resultado = $tienda->exec($sql); //ES una EJECUCCIÓN

                    if ($resultado > 0) {
                        echo "<p>Cliente insertado correctamente.</p>";
                    } else {
                        echo "<p>ERROR: No se ha podido insertar el cliente</p>";
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