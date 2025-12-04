<?php 
if (!isset($_SERVER['PHP_AUTH_USER'])){ //Si tengo un usuario definido (si ya me he autentificado)
header('WWW-Authenticate: Basic Realm="Contenido restringido"');
header('HTTP/1.0 401 Unauthorized');
echo "Usuario no reconocido!";
exit();
}
?>
<html>
    <head><title>Ejemplo de autentificación</title></head>
    <body>
        <?php
        echo "Nombre de usuario:". $_SERVER['PHP_AUTH_USER']."<br>";
        echo "Clave:".$_SERVER['PHP_AUTH_PW']."<br>";
        ?>
    </body>
</html>