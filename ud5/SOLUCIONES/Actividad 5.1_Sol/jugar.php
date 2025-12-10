<?php
session_start();

if (!isset($_SESSION["numero"])) {
    $_SESSION["numero"] = rand(1,100);
}
if (!isset($_SESSION["contador"])) {
    $_SESSION["contador"] = 1;
}
//$mensaje = "El numero es: " . $_SESSION["numero"];
if (isset($_POST["comprobar"])) {
	if (empty(trim($_POST["numero"]))) {
		$mensaje = "Introduce un numero!";
	} else if (!is_numeric($_POST["numero"]) || $_POST["numero"] < 1 || $_POST["numero"] > 100) {
		$mensaje = "El rango es de 1 a 100!";
	} else {
		$numero = $_POST["numero"];
		if ($numero < $_SESSION["numero"]) {
			$mensaje = "El numero es mayor!";
			$_SESSION["contador"]++;
		} else  if ($numero > $_SESSION["numero"]) {
			$mensaje = "El numero es menor!";
			$_SESSION["contador"]++;
		}
		if ($numero == $_SESSION["numero"]) {
			$mensaje = "Has acertado!. Has necesitado " . ($_SESSION["contador"]) . " intentos.";
			session_destroy();
			header("Refresh:3; ");
		}
	}
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jugar</title>
</head>

<body>
	<div style="text-align: center">
	<h1>Juego: Adivina el número!</h1>
	<form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
		<label for="numero">Numero:</label><br />
		<input type="number" name="numero" id="numero" /><br /><br />
		<input type="submit" name="comprobar" value="Comprobar" />
	</form>
	<p>
		<?php
			if (isset ($mensaje)) echo $mensaje;
		?>
	</p>
	</div>
</body>

</html>