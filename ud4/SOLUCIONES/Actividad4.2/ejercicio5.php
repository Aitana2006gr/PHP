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
	<h2>Película ganadora del año: </h2>
		<form method="post" id="formulario" action="ejercicio5proc.php">
			<label for="dato">Introduce el año para los Goya (2000-2014): </label>
			<input type="number" name="dato" id="dato" min="2000" max="2014">
			<input type="submit" name="enviar" id="enviar" value="Enviar">
		</form>
	<br/>
</div>

<div id="pie">
</div>

</body>
</html>