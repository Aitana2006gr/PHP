<!DOCTYPE html>
<!-- Desarrollo Web en Entorno Servidor -->
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<title>Ejercicio: Familias</title>
		<link href="dwes.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div id="encabezado">
			<h1>Ejercicio: Obtención de productos de una familia</h1>
			<form id="form_seleccion" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
				<span>Familia: </span>
				<select name="familia">
				<?php
					if (isset($_POST['familia'])) $familia = $_POST['familia'];
					// Realizamos la conexión
					$opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
					$dwes = new PDO("mysql:host=localhost;dbname=dwes", "dwes", "abc123.", $opciones);
					// Rellenamos el desplegable con los datos de todos los productos
					$sql = "SELECT cod, nombre FROM familia";
					$resultado = $dwes->query($sql);
					if($resultado) {
						$row = $resultado->fetch();
						while ($row != null) {
							echo "<option value='${row['cod']}'";
							// Si se recibió una familia la seleccionamos
							// en el desplegable usando selected='true'
							if (isset($familia) && $familia == $row['cod'])
								echo " selected='true'";
							echo ">${row['nombre']}</option>";
							$row = $resultado->fetch();
						}
						unset($resultado);
					}
				?>
				</select>
				<input type="submit" value="Mostrar productos" name="enviar"/>
			</form>
		</div>
		<div id="contenido">
		<h2>Productos de la Famila seleccionada:</h2>
		<?php
			// Si se recibió un código de producto y no se produjo ningún error
			// mostramos el stock de ese producto en las distintas tiendas
			if (isset($familia)) {
				$sql = "select cod, nombre_corto, PVP from producto where familia = '$familia'";
				$resultado = $dwes->query($sql);
				if($resultado) {
					$row = $resultado->fetch();
					while ($row != null) {
						echo "<p>[${row['cod']}] ${row['nombre_corto']} = ${row['PVP']}€.</p>";
						$row = $resultado->fetch();
					}
					unset($resultado);
				}		
			}
			unset($dwes);
		?>
		</div>
		<div id="pie">
		</div>
	</body>
</html>