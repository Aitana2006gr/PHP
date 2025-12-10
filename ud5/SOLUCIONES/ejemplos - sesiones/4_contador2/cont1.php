<?php 
session_start(); 
if (!isset($_SESSION['contador']))
	$_SESSION['contador']=0;
$_SESSION['contador']++; 
?> 
<html> 
<a href="cont2.php">Página que muestra el contador</a> 
</html>