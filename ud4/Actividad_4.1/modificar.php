<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Tienda Modificar Saldo Cliente</title>
</head>

<body>
    <div id="encabezado">

        <h1>Eliminar Cliente</h1>
        <form id="form_seleccion" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <span>
                <h4>Formulario Modificar Saldo del Cliente en 500 unidades:</h4>
            </span>
            <p>NIF: <input type="text" name="nif" required></p>
            <!--<p>Saldo: <input type="number" name="saldo" required></p>-->
            <input type="submit" name="modificar" value="Modificar Saldo">
        </form>
    </div>
    <div id="contenido">
        <?php
        if (isset($_POST["modificar"])) {
            $tienda = new PDO("mysql:host=localhost;dbname=tienda;charset=utf8", "gestor", "secreto");

            if (!$tienda) {
                echo "<p>ERROR: No se pudo conectar con la base de datos 'tienda'</p>";
            } else { //Hago uso del bloque de texto
                //Recibo los datos del formulario del dato nif
                $nif = $_POST["nif"]; // NIF fijo según el enunciado $nif = "12345678Z";
                //$saldo = $_POST["saldo"];

                //Comprobación por si están los campos vacíos
                if (empty($nif)) { //|| empty($saldo)
                    echo "<p>ERROR: Debes introducir un NIF</p>"; //y un saldo

                //Validar longitud de los campos según la tabla que fue creada en la base de datos
                } else if (strlen($nif) > 9) {
                    echo "<p>ERROR: El campo 'nif' supera la longitud máxima permitida</p>";
                /*}else if($saldo<0){
                    echo "<p>ERROR: El saldo no puede ser negativo</p>";*/
                }else {
                    //Comprobar si el cliente existe , busco el saldo actual del cliente
                    $sql = <<<SQL
						SELECT saldo FROM cliente WHERE nif = '$nif';
						SQL;

                    $resultado = $tienda->query($sql); //ES una CONSULTA

                    if ($resultado && $resultado->rowCount() > 0) {
                        $fila = $resultado->fetch();
                        $saldo=$fila["saldo"];
                        $nuevoSaldo = $saldo + 500;

                        //Si el resultado de la consulta y el nif del formulario coinciden, el cliente existente, se elimina
                        $sql = <<<SQL
                            UPDATE cliente
                            SET saldo = $nuevoSaldo
                            WHERE nif = '$nif';
                        SQL;
                        
                        $modificado = $tienda->exec($sql); //ES una EJECUCIÓN porque modifica algo de la tabla

                        if ($modificado > 0) {
                            echo "<p>Al cliente con NIF ($nif) se le ha actualizado el saldo correctamente</p>";
                            echo "Saldo anterior: $saldo<br>";
                            echo "Nuevo saldo: $nuevoSaldo<br>";
                        } else {
                            echo "<p>ERROR: No se ha podido modificar el saldo</p>";
                        }
                    } else {
                        echo "<p>No existe ningún cliente con el NIF: $nif </p>";
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