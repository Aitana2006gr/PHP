<?php
session_start();

//Limpia la sesión
$_SESSION = array();

//Destruye la sesión
session_destroy();

//Redirige a la página de login
header("Location: login.php");
exit();
