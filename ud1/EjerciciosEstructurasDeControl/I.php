<!DOCTYPE html>
<html>

<head>
    <title>Ejercicios Estructuras de control</title>
</head>

<body>
    <h3>Actividad 3.1</h3>
    <h4>Ejercicio i</h4>

    <?php
    /*Averigua si un número es primo de forma óptima, es decir, cuando encuentre un
    divisor se abandona el bucle repetitivo.*/
    $n=2;
	$primo=true;
	for ($i=2;$i<$n;$i++){
		//echo $i."<br>";
		if ($n%$i==0){
			$primo=false;
			break;
		}  
	}
	if ($primo && $n!=1) echo $n." es número primo.<br>";
	else echo $n." no es número primo.<br>";
    ?>
</body>
</html>