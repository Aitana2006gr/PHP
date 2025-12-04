<?php 
require ("conexion.php");

$nif="98765432A";

$sql="DELETE FROM pedido WHERE cliente='$nif'";
$sql2="DELETE FROM cliente WHERE nif='$nif'";

$resultado = $dwes->exec($sql);
$resultado = $dwes->exec($sql2);

if ($resultado) {
	print "<p>Se han eliminado $resultado registros de la tabla cliente.</p>";
}
else
	echo "Cliente no encontrado"; 

unset($dwes);

?>

