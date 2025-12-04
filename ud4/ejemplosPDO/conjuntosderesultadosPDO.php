<!DOCTYPE html>
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Ejemplo: Conjuntos de datos con PDO -->
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<title>Ejemplo: Conjuntos de resultados en PDO</title>
		<link href="dwes.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div id="encabezado">
			<h1>Ejemplo: Conjuntos de resultados en PDO</h1>
			<form id="form_seleccion" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
				<span>Producto: </span>
				<select name="producto">
					<?php
					error_reporting(E_ERROR | E_WARNING | E_PARSE);
						if (isset($_POST['producto'])) $producto = $_POST['producto'];
						//Rellenamos el desplegable con los datos de todos los productos
						//$dwes = new PDO("mysql:host=localhost;dbname=dwes", "dwes", "abc123.");
						$dwes = new PDO("mysql:host=localhost;dbname=dwes", "gestor", "secreto"); //objeto de conexion con la base de datos
						$sql = "SELECT cod, nombre_corto FROM producto"; //la consulta que realizaremos con el query()
						$resultado = $dwes->query($sql);
						if($resultado) {
							$row = $resultado->fetch();
							while ($row != null) {
								echo "<option value='${row['cod']}'";
								// Si se recibió un código de producto lo seleccionamos
								// en el desplegable usando selected='true'
								if (isset($producto) && $producto == $row['cod'])
									echo " selected='true'";
								echo ">${row['nombre_corto']}</option>";
								$row = $resultado->fetch();
							}
						}
					?>
				</select>
				<input type="submit" value="Mostrar stock" name="enviar"/>
			</form>
		</div>
		<div id="contenido">
			<h2>Stock del producto en las tiendas:</h2>
			<?php
				// Si se recibió un código de producto
				// mostramos el stock de ese producto en las distintas tiendas
				if (isset($producto)) {
					$sql = <<<SQL
						SELECT tienda.nombre, stock.unidades
						FROM tienda INNER JOIN stock ON tienda.cod=stock.tienda
						WHERE stock.producto='$producto'
						SQL;
					$resultado = $dwes->query($sql);
					if($resultado) {
						$row = $resultado->fetch();
						while ($row != null) {
							echo "<p>Tienda ${row['nombre']}: ${row['unidades']} unidades.</p>";
							$row = $resultado->fetch();
						}
					}
				}
			?>
		</div>
		<div id="pie">
			<?php
				unset($dwes);
			?>
		</div>
	</body>
</html>