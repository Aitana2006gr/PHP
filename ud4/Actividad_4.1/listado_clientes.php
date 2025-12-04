<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<title>Tienda listado clientes</title>
</head>

<body>
	<div id="encabezado">

		<h1>Listado de clientes</h1>
		<form id="form_seleccion" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<span>Mostrar lista de clientes: </span>
			<input type="submit" value="Mostrar lista" name="enviar" />
		</form>
	</div>
	<div id="contenido">
		<h2>Lista de los clientes: </h2>
		<?php
		if (isset($_POST["enviar"])) {
			$tienda = new PDO("mysql:host=localhost;dbname=tienda;charset=utf8", "gestor", "secreto");
			if (!$tienda) {
				echo "<p>ERROR: No se pudo conectar con la base de datos 'tienda'</p>";
			} else { //Hago uso del bloque de texto
				$sql = <<<SQL
						SELECT nif, nombre, direccion, telefono
						FROM cliente
						SQL;
				$resultado = $tienda->query($sql);
				if ($resultado) {
					$fila = $resultado->fetch();
					while ($fila != null) {
						echo "<strong>CLIENTE</strong> con nif: " . $fila["nif"] . "<br>";
						echo "Nombre:" . $fila["nombre"] . "<br>";
						echo "Dirección: " . $fila["direccion"] . "<br>";
						echo "Teléfono: " . $fila["telefono"] . "<br>";
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