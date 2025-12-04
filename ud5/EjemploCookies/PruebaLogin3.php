<?php
//Ejercicio autentificación
if (!isset($_SERVER['PHP_AUTH_USER'])) { //Si tengo un usuario definido (si ya me he autentificado)
    header('WWW-Authenticate: Basic Realm="Contenido restringido"');
    header('HTTP/1.0 401 Unauthorized');
    echo "Usuario no reconocido!";
    exit();
} else { //Si las credenciales estaban establecidas, las comprobamos con la base de datos
    $bd = new PDO("mysql:host=localhost;dbname=dwes", "gestor", "secreto");
    $sql = "SELECT usuario FROM usuarios WHERE usuario='" . $_SERVER['PHP_AUTH_USER'] .
        "' AND contrasena= md5('" . $_SERVER['PHP_AUTH_PW'] . "')";
    $resultado = $bd->query($sql);
    if (!$resultado->fetch()) {
        header('WWW-Authenticate: Basic Realm="Contenido restringido"');
        header('HTTP/1.0 401 Unauthorized');
        exit();
    }
    unset($bd);
    unset($resultado);
}
?>
<html>

<head>
    <title>Ejemplo de autentificación</title>
</head>

<body>
    <?php
    echo "Nombre de usuario:" . $_SERVER['PHP_AUTH_USER'] . "<br>";
    echo "Clave:" . $_SERVER['PHP_AUTH_PW'] . "<br>";
    ?>
</body>

</html>
