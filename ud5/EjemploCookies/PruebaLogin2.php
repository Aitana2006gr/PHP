<?php 
if ($_SERVER['PHP_AUTH_USER']!="gestor"|| $_SERVER['PHP_AUTH_PW']!="secreto"){ //No se suele verificar aqui los datos
header('WWW-Authenticate: Basic Realm="Contenido restringido"');
header('HTTP/1.0 401 Unauthorized');
echo "Usuario no reconocido!";
exit();
}
//Este logeo se mantiene hasta que se cierre el navegador o la sesión
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