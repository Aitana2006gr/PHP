<!DOCTYPE html>
<html>

<head>
    <title>Ejercicios Estructuras de control</title>
</head>

<body>
    <h3>Actividad 3.1</h3>
    <h4>Ejercicio h</h4>

    <?php
    /*Realiza un programa PHP que muestre los siguientes valores:
    1
    1 2
    1 2 3
    1 2 3 4
    1 2 3 4 5
    1 2 3 4 5 6
    1 2 3 4 5 6 7
    1 2 3 4 5 6 7 8
    1 2 3 4 5 6 7 8 9
    1 2 3 4 5 6 7 8 9 10
    Y otro que muestre:
    10 9 8 7 6 5 4 3 2 1
    9 8 7 6 5 4 3 2 1
    8 7 6 5 4 3 2 1
    7 6 5 4 3 2 1
    6 5 4 3 2 1
    5 4 3 2 1
    4 3 2 1
    3 2 1
    2 1
    1*/
    // numero maximo de filas

    //parte de arriba
    for ($i=1;$i<=10;$i++){
		for ($z=1;$z<=$i;$z++)
			echo "$z ";
		echo "<br>";
	}
    //parte de abajo
    for ($i=10;$i>=1;$i--){
		for ($z=$i;$z>=1;$z--)
			echo "$z ";
		echo "<br>";
	}
    ?>
</body>
</html>