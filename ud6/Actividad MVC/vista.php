<html>

<head>
	<title>Ejemplo</title>
</head>

<body>
	<h1>Listado de Artículos</h1>
	<table>
		<tr>
			<th>Productos</th>
			<th>Precio</th>
		</tr>
		<?php
		// Mostrar los resultados con HTML
		foreach ($articulos as $articulo) {
			echo "\t<tr>\n";
			printf("\t\t<td> %s </td>\n", $articulo['nombre_corto']);
			printf("\t\t<td> %s </td>\n", $articulo['PVP']);
			echo "\t</tr>\n";
		}
		?>
	</table>
</body>

</html>

<?php
// Cerrar la conexion
closeConexion($conexion);
?>