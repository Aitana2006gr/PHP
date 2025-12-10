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
    <h2>Película ganadora del Goya en 2014</h2>
<?php
	require ("conectar.php");
	$sql="SELECT titulo FROM pelicula WHERE fecha='2014'";
	if ($resultado=$conn->query($sql)){
		$fila=$resultado->fetch();
		echo " - ".$fila['titulo']."<br/><br/>";
		unset($resultado);
	}
	else { echo "Error";}
	unset($conn);
?>
</div>

<div id="pie">
</div>

</body>
</html>