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
	<h2>Opciones disponibles:</h2>
<?php
	if(isset($_POST['enviar'])){
		switch ($_POST['opcion']) {
		case 1:
			header('Location:ejercicio2.php');
			break;
		case 2:
			header('Location:ejercicio8b.php');
			break;
		case 3:
			header('Location:ejercicio8c.php');
			break;
		default:
			echo "Error: Debe seleccionar una opcion entre 1 y 3.";
		}
	}else{
?>
	<form name="formulario" method="post" action="">
		<h3>  1 - Películas ganadoras por año </h3>
		<h3>  2 - Listado de todas las películas </h3>
		<h3>  3 - Listado de directores </h3>
		<label for="opcion">Opción:</label>
		<input id="opcion" name="opcion" type="number" min="1" max="3" />
		<input type="submit" id="enviar" name="enviar" value="enviar"/>
	</form>
	<br/>
<?php
	}
?>
</div>

<div id="pie">
</div>

</body>
</html>