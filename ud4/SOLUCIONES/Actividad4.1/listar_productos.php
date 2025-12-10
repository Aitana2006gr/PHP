<?php 
require ("conexion.php");
$sql= "SELECT * FROM producto ORDER by nombre"; 
$result = $dwes->query($sql); 
/* associative array */ 
while ($row = $result->fetch()){
	echo $row['nombre']." - ".$row['precio']."€ - ".$row['descripcion']."<br />"; 
}

?>
