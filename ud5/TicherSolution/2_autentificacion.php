<?php
// Si el usuario aún no se ha autentificado, pedimos las credenciales
if (!isset($_SERVER['PHP_AUTH_USER'])) {
	header('WWW-Authenticate: Basic realm="Contenido restringido"');
	header("HTTP/1.0 401 Unauthorized");
	exit();
}
// Si ya ha enviado las credenciales, las comprobamos con la base de datos
else {
	// Conectamos a la base de datos
	$dwes = new PDO("mysql:host=localhost;dbname=dwes", "dwes", "abc123.");
	// Ejecutamos la consulta para comprobar si existe
	// esa combinación de usuario y contraseña
	$sql = "SELECT usuario FROM usuarios
		WHERE usuario='$_SERVER[PHP_AUTH_USER]' AND
		contrasena=md5('$_SERVER[PHP_AUTH_PW]')";
	$resultado = $dwes->query($sql);
	// Si no existe, se vuelven a pedir las credenciales
	if(!$resultado->fetch()) {
		header('WWW-Authenticate: Basic realm="Contenido restringido"');
		header("HTTP/1.0 401 Unauthorized");
		exit();
	}
	unset($resultado);
	unset($dwes);
}
?>
<!DOCTYPE html>
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Ejemplo: Utilización de MySQL para autentificación HTTP -->
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<title>Ejemplo: Utilización de MySQL para autentificación HTTP</title>
		<link href="dwes.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<?php
			echo "Nombre de usuario: ".$_SERVER['PHP_AUTH_USER']."<br />";
			echo "Hash de la contraseña: ".md5($_SERVER['PHP_AUTH_PW'])."<br />";
		?>
	</body>
</html>
