<?php
    // Conexión a la base de datos
	require "conexion.php";

    // Conseguir vehículos de ocasión
    $sql = "SELECT * FROM vehiculo WHERE vendido='0'";
	$resultado1 = $conn->query($sql);
	$resultado2 = $conn->query($sql);

    // Si se pulsa el botón comprar se ejecutará esta parte del código
    if (isset($_POST['comprar'])) {
		$matricula=$_POST['matricula'];
		$cliente=$_POST['cliente'];
		$cuota=$_POST['cuota'];
		$fecha=date("Y-m-d");
		$sql = "SELECT * FROM vehiculo WHERE matricula='$matricula'";
		$resultado3 = $conn->query($sql);
		$car=$resultado3->fetch();
		$pendiente=$car['PVP'];
		$visualizaDatos=true;
		
		//transaccion
		try{
			$conn->beginTransaction();

			$sql="INSERT INTO compra (id_matricula,cliente,cuota,f_compra,pendiente) 
					VALUES (:matricula, :cliente, :cuota, :f_compra, :pendiente)";
			$compra= $conn->prepare($sql);	
			$compra->bindParam(':matricula', $matricula);
			$compra->bindParam(':cliente', $cliente);
			$compra->bindParam(':cuota', $cuota);
			$compra->bindParam(':f_compra', $fecha);
			$compra->bindParam(':pendiente', $pendiente);			
			$compra->execute();

			$sql="UPDATE vehiculo SET vendido=1 WHERE matricula=:matricula";
			$venta= $conn->prepare($sql);	
			$venta->bindParam(':matricula', $matricula);
			$venta->execute();

			$conn->commit();
			$mensaje = "Transacción confirmada";
		}
		catch (Exception $e) {
			$conn->rollBack();
			$mensaje = "Error en transacción: ".$e->getMessage();
		}		
	}

	// Cerramos la conexión a la BD
    unset($conn);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Comprar</title>
  <link rel="stylesheet" href="dwes.css">
</head>
<body>
<div id="encabezado">
	<h1>Ejercicio: Comprar</h1>
</div>

<div id="contenido">
    <h2>Listado de vehículos de ocasión:</h2>
    <table>
        <tr>
            <th>Matrícula</th>
            <th>Marca</th>
            <th>Tipo</th>
            <th>Descripción</th>
            <th>Precio</th>
        </tr>
    <?php
		while($car=$resultado1->fetch()) {
        ?>
        <tr>
            <td><?php echo $car['matricula']; ?></td>
            <td><?php echo $car['marca']; ?></td>
            <td><?php echo $car['tipo']; ?></td>
            <td><?php echo $car['descripcion']; ?></td>
            <td><?php echo $car['PVP']; ?></td>
        </tr>
		<?php 
		}
		?>
    </table>
    <h2>Formulario de compra:</h2>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
			Matrícula:
			<select name="matricula">
				<?php
				while($car=$resultado2->fetch()) {
				?>
				<option value="<?php echo $car['matricula']; ?>"><?php echo $car['matricula']; ?></option>
				<?php 
				}
				?>
			</select>
			<p>Cliente: <input type="text" name="cliente" /></p>
			<p>Cuota: <input type="number" name="cuota" max="10000"/></p>
			<p><input type="submit" name="comprar" value="Comprar">
			<input type="reset" name="limpiar" value="Limpiar"></p>
        </form>
		<?php
		if (isset($visualizaDatos)) {
			echo "<h2>Datos a insertar</h2>";
			echo "Matrícula: ".$matricula;
			echo "<br/>Cliente: ".$cliente;
			echo "<br/>Cuota: ".$cuota;
			echo "<br/>Fecha de compra: ".$fecha;
			echo "<br/>Cantidad pendiente: ".$pendiente."€";
			echo "<br/><br/>";
		}
		?>
</div>

<div id="pie">
	<?php
	if (isset($mensaje)) echo $mensaje;
	?>
</div>
</body>
</html>
