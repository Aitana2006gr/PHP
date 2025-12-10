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
	<h2>Directores:</h2>
<?php
	require ('conectar.php');
	$sql = "SELECT nombre,apellidos FROM director"; 
	if ($resultado=$conn->query($sql)){
		echo "<ul>";
		while ($row=$resultado->fetch()) {
		echo "<li>" . $row['nombre']. " " . $row['apellidos']. "</li>";
		}
		echo "</ul>";
		}	       
	else { echo "Error";}
	unset($conn); 	
?>
</div>

<div id="pie">
</div>

</body>
</html>