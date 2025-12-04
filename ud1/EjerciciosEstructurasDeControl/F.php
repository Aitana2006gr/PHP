<!DOCTYPE html>
<html>

<head>
    <title>Ejercicios Estructuras de control</title>
</head>

<body>
    <h3>Actividad 3.1</h3>
    <h4>Ejercicio f</h4>

    <?php
    /*Realiza un programa que genere 10 valores de la siguiente serie: 1/2, 2/4, 3/8, 4/16…*/
    for($i=1,$z=2;$i<=10;$i++){
        echo "$i/$z,";
        
        $z=2*$z;
    }
    
    ?>
</body>
</html>