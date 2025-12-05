<?php
session_start();

//Limpiar
$_SESSION = array();
//Destruye la sesión
session_destroy();

//Redirige a la página de logearse
header("Location: login.php");
exit();
?>