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
    <h2>Número de directores y películas</h2>
<?php
	require ("conectar.php");
	$sql="SELECT count(*) FROM pelicula";
	if ($resultado=$conn->query($sql)){
		$nfilas=$resultado->fetch();
		echo "Número de películas: " .$nfilas[0] . "<br/>";		
		unset($resultado);
	}
	else { echo "Error";}
	$sql ="SELECT count(*) FROM director";
	if ($resultado=$conn->query($sql)){
		$nfilas=$resultado->fetch();
		echo "<br>Número de directores: " .$nfilas[0] . "<br/><br/>";		
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