<?php
if (!isset($_SERVER["PHP_AUTH_USER"])) {
    header('WWW-Authenticate: Basic Realm="Contenido restringido"');
    header('HTTP/1.0 401 Unauthorized');
    echo "Usuario no reconocido!";
    exit();
}
else {
    //Si las credenciales estaban establecidas la comprobamos con la bbdd
    $dwes = new PDO("mysql:host=localhost;dbname=dwes",
        "gestor", "secreto");
    $sql = "SELECT usuario FROM usuarios WHERE usuario = '" . $_SERVER["PHP_AUTH_USER"] .
        "' AND contrasena = md5('" . $_SERVER["PHP_AUTH_PW"] . "')";
    $result = $dwes->query($sql);
    if (!$result->fetch()){
        header('WWW-Authenticate: Basic Realm="Contenido restringido"');
        header('HTTP/1.0 401 Unauthorized');
        exit();
    } else {
        if (isset($_COOKIE["ultimo_login"])){ //nombre de la cookie
            //Si esta puesta la cookie, le da el último valor
            $ultimo_login = $_COOKIE["ultimo_login"]; //Sacamos el valor de la cookie
        }
        //En cada iteración, la cookie se actualiza
        setcookie("ultimo_login",time(), time() + 3600); 
        //Le tengo que poner un valor a la cookie, esta cookie desde que estamos, durara una hora time()+3600
        //Aqui lo que se hace es darle el valor, en este caso, time()
    }
    unset($dwes);
    unset($result);
}

?>
<html>
<head>
    <title>Ejemplo de autentificación</title>
</head>
<body>
<?php
echo "Nombre de usuario: " . $_SERVER['PHP_AUTH_USER'] . "<br>";
echo "Clave: " . $_SERVER['PHP_AUTH_PW'] . "<br>";
if (isset($ultimo_login)){ //Si esta puesto el últimologin,  aparece por pantalla
    echo "Último login: " . date("d/m/Y H:i:s", $ultimo_login) . "<br>";
}else {
    echo "Bienvenido. Esta es tu primera visita";
}
?>
</body>
</html>


