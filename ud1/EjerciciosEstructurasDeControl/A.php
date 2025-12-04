<!DOCTYPE html>
<html>

<head>
    <title>Ejercicios Estructuras de control</title>
</head>

<body>
    <h3>Actividad 3.1</h3>
    <h4>Ejercicio a</h4>

    <?php
    /*Utiliza un bucle que creas oportuno para sumar los números naturales pares del 10 al
    100 y muestra el resultado de la suma*/
    $resultadoSuma=0;
    //if($num%2==0){} //es par si da 0
    for ($i=10; $i<=100;$i+=2){ //inicio en 10, hasta el numero 100, y le incremento dos desde el inicio, 
        //porque ya empezabamos en 10 que es par
        $resultadoSuma+=$i; // $resultadoSuma=$resultadoSuma+$i;
    }
    echo "La suma de los numero naturales pares del 10 al 100 es: ".$resultadoSuma;

    ?>
</body>
</html>