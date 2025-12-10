<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Goyas</title>
  <link rel="stylesheet" href="dwes.css">
</head>

<body>

<div id="encabezado">
	<h1>Actividad 4.2: Goyas</h1>
</div>

<div id="contenido">
	<h2>Insertar director en la base de datos</h2>
<?php
	require('conectar.php');
	$sql = "INSERT INTO director (codDirector, nombre, apellidos) VALUES ('D14', 'Achero', 'Mañas')";
	$affected_rows=$conn->exec($sql);
	if ($affected_rows)
		echo "Se realizado $affected_rows inserción en la base de datos.<br/><br/>";
	else
		echo "Inserción no realizada";
	unset($conn);
?>
</div>

<div id="pie">
</div>

</body>
</html>