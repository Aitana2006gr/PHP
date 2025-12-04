<?php 
require ("conexion.php");

$nif="12345678Z";

$sql="UPDATE cliente SET saldo=saldo+500 WHERE nif='$nif'";

$resultado = $dwes->exec($sql);
	
if ($resultado)
	print "<p>Se han modificado $resultado registros.</p>";
else
	echo "Cliente no encontrado"; 

unset($dwes);

?>
