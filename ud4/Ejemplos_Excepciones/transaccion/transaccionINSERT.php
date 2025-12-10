<?php
//establecer conexion
require "conexion.php";

try{
	//transaccion
	$dwes->beginTransaction();
	
	$dwes->exec("INSERT INTO familia (cod, nombre) VALUES('ELEC', 'electrico')");
	echo "Primera"."<br>";

	$dwes->exec("INSERT INTO familias VALUES('ELEC', 'bajo consumo')");
	echo "Segunda"."<br>";

	$dwes->commit();
	echo "Transacción confirmada - Datos insertados"."<br>";
}
catch (PDOException $e) {
	$dwes->rollBack();
	echo "Deshacemos operaciones!<br>";
	echo "Error: " . $e->getMessage();
}

//cerrar conexion
$dwes = null;
?>