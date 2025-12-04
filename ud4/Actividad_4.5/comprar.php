<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Actividad 4.5</title>
</head>

<body>
    <h1>Ejercicio: Ocasion</h1>
    <h2>Listado de los vehículos disponibles para la venta</h2>
    <?php
    require_once("conexion.php");
    //Función para mostrar todos los vehículos ordenados por matricula
    function mostrarVehiculos($conexion)
    {
        try {
            //WHERE vendido='0' para poner solo los que no estan vendidos
            $sql = "SELECT * FROM vehiculo  ORDER BY vendido"; //Selecciono todo
            $resultado = $conexion->query($sql);

            if ($resultado) {
                echo "<table border='1'> ";
                echo "<tr><th>Matricula</th><th>Marca</th><th>Descripcion</th><th>Precio</th><th>Tipo</th><th>Vendido</th></tr>";
                while ($fila = $resultado->fetch()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($fila["matricula"]) . "</td>";
                    echo "<td>" . $fila["marca"] . "</td>";
                    echo "<td>" . $fila["descripcion"] . "</td>";
                    echo "<td>" . number_format($fila["PVP"], 2, ',', '.') . "</td>"; //number_format para los decimales y cambio de comas y puntos
                    echo "<td>" . $fila["tipo"] . "</td>";
                    echo "<td>" . ($fila["vendido"] ? "Sí": "No") . "</td>"; //Muestro dependiendo de si su valor es 0 o 1
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<p>ERROR: No se pudieron obtener los vehículos.</p>";
            }
        } catch (PDOException $error) {
            echo "<p>ERROR: No se pudo listar los vehículos: " . $error->getMessage() . "<p>";
            exit();
        }
    }

    //Función para el formulario
    function mostrarFormulario($conexion)
    {
        echo "<h2>Formulario Comprar Vehiculo</h2>";
        echo '<form id="form_seleccion" method="post" action="' . $_SERVER["PHP_SELF"] . '">';

        echo "Matricula: ";
        echo '<select name="matricula" required>'; //Lista desplegable para seleccionar
        echo '<option value="..."</option>'; //Para las opciones
        try {
            $sql = "SELECT matricula FROM vehiculo WHERE vendido='0'";
            $resultado = $conexion->query($sql);
            if ($resultado) {
                while ($fila = $resultado->fetch()) { //Creo las opciones 
                    echo '<option value="' . $fila["matricula"] . '">' . $fila["matricula"] . '</option>';
                }
            } else {
                echo '<option value="">ERROR: No se pudo obtener la matricula</option>';
            }
            echo "</select><br><br>";

        } catch (PDOException $error) {
            echo "<p>ERROR: No se pudo obtener las matriculas</p>";
            echo '<option value="">ERROR: ' . $error->getMessage() . '</option>';
        }
        echo "</select>";
        echo "<strong>Cliente:</strong><br>";
        echo "<br>";
        //Más campos del formulario
        echo 'Nombre y Apellidos: <input type="text" name="nombreCliente" value=""/>' . "<br>";
        echo "<br>";
        echo 'Cuota: <input type="text" name="cuota" value=""/>' . "<br>";
        echo "<br>";
        //Botones
        echo '<input type="submit" name="botonComprar" value="Comprar">';
        echo '<input type="reset" name="botonLimpiar" value="Limpiar">';
        echo '</form>';
    }
    //Función que implementa el boton de compra
    function realizarCompra($conexion, $matricula, $cliente, $cuota)
    {
        try {
            $conexion->beginTransaction(); //Inicio la transaccion

            //Obtengo el precio del vehículo y su disponibilidad
            $sql = "SELECT PVP FROM vehiculo WHERE matricula=:matricula AND vendido='0'";
            $consulta = $conexion->prepare($sql);
            $consulta->bindParam(':matricula', $matricula);
            $consulta->execute();
            $vehiculo = $consulta->fetch(PDO::FETCH_ASSOC); //el resultado de la consulta
            //Compruebo si esta disponible
            if (!$vehiculo) {
                echo "<p>ERROR: El vehículo ya fue vendido o no existe</p>";
            }

            $pendiente = $vehiculo['PVP'];
            $fecha = date('Y-m-d'); 

            //Muestro los datos para insertar
            echo "<h3>Datos de la compra:</h3>";
            echo "Matrícula: $matricula<br>";
            echo "Cliente: $cliente<br>";
            echo "Cuota: $cuota<br>";
            echo "Fecha: $fecha<br>";
            echo "Pendiente: $pendiente<br><br>";

            //Insertar el registro en la tabla de la compra
            $sql="INSERT INTO compra (id_matricula, cliente, cuota, f_compra, pendiente) VALUES (:matricula, :cliente, :cuota, :fecha, :pendiente)";
            $insert = $conexion->prepare($sql);
            $insert->bindParam(':matricula', $matricula); //:matricula para el nombre del parametro, y $matricula es el parametro pasado
            $insert->bindParam(':cliente', $cliente);
            $insert->bindParam(':cuota', $cuota);
            $insert->bindParam(':fecha', $fecha);
            $insert->bindParam(':pendiente', $pendiente);
            $insert->execute(); //Ejecuto el insert en la compra

            //Actualizo el vehiculo a vendido
            $update = $conexion->prepare("UPDATE vehiculo SET vendido='1' WHERE matricula=:matricula");
            $update->bindParam(':matricula', $matricula);
            $update->execute();

            //Confirmo y realizo la transaccion con el commit
            $conexion->commit(); 
            echo "<p>Se ha completado la compra correctamente</p>";
        } catch (Exception $error) { //Si hay algun fallo, uso el rollBack para invertir los cambios
            $conexion->rollBack();
            echo "<p>ERROR: No se ha podido realizar la compra " . $error->getMessage() . "</p>";
        }
    }
    //Para la acción del botonComprar
    function botonComprar($conexion)
    {
        if (isset($_POST["botonComprar"])) { //Si es pulsado
            //Adquiero los datos del formulario
            $matricula = $_POST["matricula"];
            $cliente = $_POST["nombreCliente"];
            $cuota = $_POST["cuota"];
            //Compruebo que no esten vacíos
            if ($matricula != "" && $cliente != "" && $cuota != "") {
                //Si no lo están, realizo la compra
                realizarCompra($conexion, $matricula, $cliente, $cuota);
            } else {
                echo "<p>ERROR: Debe completar todos los campos.</p>";
            }
        }
    }

    //Principal
    if (!$conexion) { //Compruebo que haya conexion con la base de datos
        echo "<p>ERROR: No se pudo conectar con la base de datos 'ocasion'</p>";
    } else {
        mostrarVehiculos($conexion);
        mostrarFormulario($conexion);
        botonComprar($conexion);
    }
    unset($conexion);
    ?>
</body>

</html>
<!--
44 puntos 
33 test que vale la mitad  /40 puntos que son 20
14/18
1
15+16.5=31.5/44 -> 71,59

44 puntos 
32 test que vale la mitad  /40 puntos que son 20
16/18
2
18+16=34/44 -> 77,27
-->