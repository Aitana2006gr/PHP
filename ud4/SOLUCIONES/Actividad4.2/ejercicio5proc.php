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
	<h2>Película ganadora del año <?php echo $_POST['dato'] ?>: </h2>
<?php
	require('conectar.php');
	$year=$_POST['dato'];
	$sql="SELECT titulo,genero,fecha FROM pelicula WHERE fecha=$year";
	if ($resultado = $conn->query($sql)) {
		while ($row = $resultado->fetch()){
			echo  $row[0]. " - " . $row[1]. " - " . $row[2]."<br/><br/>";
		}
		unset($resultado);
	}
	else { echo "Error en la consulta";	}
	unset($conn);
?>	
</div>

<div id="pie">
</div>

</body>
</html>