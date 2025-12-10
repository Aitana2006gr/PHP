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
	<h2>Películas ganadoras por año:</h2>
<?php
	require ('conectar.php');
	$sql = "SELECT titulo,fecha,genero,numGoyas FROM pelicula"; 
	if ($resultado=$conn->query($sql)){
		echo "<table border='1' \n>";
		echo "<tr><th>Título</th><th>Fecha</th><th>Género</th><th>Núm.goyas</th></tr>";
		while ($row=$resultado->fetch()) {
		echo "<tr><td>" . $row['titulo']. "</td><td>" . $row['fecha']. "</td>
				  <td>" . $row['genero']."</td><td>". $row['numGoyas']."</td>";
		}
		echo "</tr>";
		echo "</table>";
		echo "<br/>";
		}	    
	else { echo "Error";}
	unset($conn);    
?>	
</div>

<div id="pie">
</div>

</body>
</html>
