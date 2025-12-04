<!DOCTYPE html>
<html>

<head>
    <title>Ejercicios Estructuras de control</title>
</head>

<body>
    <h3>Actividad 3.1</h3>
    <h4>Ejercicio g</h4>

    <?php
    /*Muestra la tabla de multiplicar de un número, pero colorea las filas alternando dos
    colores diferentes en las filas pares y las impares.*/
    echo "<table border='1'>";
	$numero=5;

	for($i=1;$i <= 10;$i++){
		$res=$numero*$i;
		if ($i%2==0)
			{$color="red";}
		else
			{$color="blue";}
			
		echo"<tr bgcolor=$color>"; 
		echo "<td> $numero </td>";
		echo "<td>x</td>";
		echo "<td>$i</td>";
		echo "<td>=</td>";
		echo "<td>$res</td>";
		echo"</tr>";        
	}
	echo "</table>";
    ?>
</body>
</html>