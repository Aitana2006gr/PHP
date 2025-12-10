
<?php 
session_start(); 
if (!isset($_SESSION['contador']))
	$_SESSION['contador']=0;

$_SESSION['contador']++; 

echo "Te has conectado ". $_SESSION['contador']." veces. <br>";
	
?> 
<html> <a href="2_contador.php">Conectarse de nuevo a la sesión</a> </html>


