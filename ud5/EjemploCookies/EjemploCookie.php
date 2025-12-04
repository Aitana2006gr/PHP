<?php
if (!isset($_SERVER['PHP_AUTH_USER'])) { //Si tengo un usuario definido (si ya me he autentificado)
    header('WWW-Authenticate: Basic Realm="Contenido restringido"');
    header('HTTP/1.0 401 Unauthorized');
    echo "Usuario no reconocido!";
    exit();
} else {
    //Conecto la base de datos
    $bd = new PDO("mysql:host=localhost;dbname=dwes", "gestor", "secreto");
    $sql = "SELECT usuario FROM usuarios WHERE usuario='" . $_SERVER['PHP_AUTH_USER'] .
        "' AND contrasena= md5('" . $_SERVER['PHP_AUTH_PW'] . "')";
        //md5 se utiliza https://www.md5hashgenerator.com/es/
    $resultado = $bd->query($sql);
    //Si no existe, se vuelven a pedir las credenciales
    if (!$resultado->fetch()) {
        header('WWW-Authenticate: Basic Realm="Contenido restringido"');
        header('HTTP/1.0 401 Unauthorized');
        exit();
    } else {
        if (isset($_COOKIE['ultimo_login'])) {
            $ultimo_login = $_COOKIE['ultimo_login'];
        }
        setcookie('ultimo_login', '', time() + 3600);

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
    if (isset($ultimo_login)) {
        echo "Ultimo login:" . date("d/m/y \a \l\a\s H:i_s") . $ultimo_login . "<br>";
    } else {
        echo "Bienvenido. Esta es tu primera visita";
    }

    ?>
</body>

</html>