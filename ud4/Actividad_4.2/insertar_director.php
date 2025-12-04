<?php 
require ("conexion.php");
$director="codirector";
$nombre="Achero";
$apellidos="Mañas";

$sql="INSERT INTO director VALUES ('$director', '$nombre', '$apellidos')";

$resultado = $conexion->exec($sql);
	
if ($resultado) {
	print "<p>Se ha insertado $resultado registro.</p>";
}
else
	echo "Inserción no realizada"; 
unset($conexion);

?>