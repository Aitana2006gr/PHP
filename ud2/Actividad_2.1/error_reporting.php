<?php
echo '<h3>"error_reporting"</h3>';
echo "Link del manual de php: https://www.php.net/manual/es/function.error-reporting.php<br><br>";
echo "Para desactivar toda notificación de error:<br>";
echo "error_reporting(0);<br><br>";

echo "Para notificar solamente errores de ejecución:<br>";
echo "error_reporting(E_ERROR | E_WARNING | E_PARSE);<br>";
echo "error_reporting(E_ERROR | E_PARSE);<br><br>";

echo "Para notificar E_NOTICE también puede ser bueno (para informar de variables no inicializadas o capturar errores en nombres de variables ...):<br>";
echo "error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);<br><br>";

echo "Para notificar todos los errores excepto E_NOTICE (Este es el valor predeterminado establecido en php.ini):<br>";
echo "error_reporting(E_ALL ^ E_NOTICE);<br><br>";

echo "Para notificar todos los errores de PHP (ver el registro de cambios):<br>";
echo "error_reporting(E_ALL);<br><br>";

?>