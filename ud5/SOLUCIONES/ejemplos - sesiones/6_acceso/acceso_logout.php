<?php
	session_start();    // unirse a la sesión
						//comprobar si existe la variable usuario????
	$_SESSION = array();
	session_destroy();	// eliminar la sesion
	setcookie(session_name(), "", time() - 1000); // eliminar la cookie
	header("Location: acceso_login.php");