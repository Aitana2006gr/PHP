<?php 
require ("conexion.php");
$sql= "SELECT * FROM cliente ORDER by nif LIMIT 10"; 
$result = $dwes->query($sql); 
/* associative array */ 
while ($row = $result->fetch()){
	echo $row['nombre']." - ".$row['direccion']." - ".$row['telefono']."<br />"; 
}

?>