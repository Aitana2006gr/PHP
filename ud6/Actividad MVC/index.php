<?php
//El index funciona como controlador
require_once "modelo.php";
$articulos=getTodosLosArticulos();
require_once "vista.php";

?>
