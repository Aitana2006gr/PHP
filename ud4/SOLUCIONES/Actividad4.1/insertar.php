<?php 
require ("conexion.php");

$nif="44538954c";
$nombre="Pepe";
$direccion="Santa Fe, 5, Buenos Aires";
$email="pepe@gmail.com";
$telefono="635543534";
$saldo=45;

$sql="INSERT INTO cliente VALUES ('$nif', '$nombre', '$direccion', '$email', '$telefono', '$saldo')";

$resultado = $dwes->exec($sql);
	
if ($resultado) {
	print "<p>Se ha insertado $resultado registro.</p>";
}
else
	echo "Inserción no realizada"; 
unset($dwes);

?>