<!DOCTYPE html>
<html>

<head>
    <title>Ejercicios Estructuras de control</title>
</head>

<body>
    <h3>Actividad 3.1</h3>
    <h4>Ejercicio e</h4>

    <?php
    /*Realiza un programa que muestre la serie de Fibonacci: 0,1,1,2,3,5,8,13,…*/
    
    function serieFibonacci($numero){
        if ($numero <= 0) { //Si numero es menor o igual a 0
            return []; //Devuelve array vacío
        } elseif ($numero == 1) { //Si el numero es 1
            return [0]; //Devuelve 0 en el array porque el primer número de Fibonnaci es 0
        } else {
            $serie = [0, 1]; //Inicializa la serie con los dos primeros números
            for ($i = 2; $i < $numero; $i++) { //A ese array se le suma hasta llegar al numero
                //Cada nuevo término es la suma de los dos anteriores
                $siguienteNumero= $serie[$i - 1] + $serie[$i - 2]; //
                $serie[] = $siguienteNumero; //Agrega el nuevo número a la serie del array
            }
            return $serie;
        }
    }

    //Variables
    $cantidadTerminos = 10; //Numeró a modificar según la cantidad que se quiera ver
    $resultado = serieFibonacci($cantidadTerminos); //La cantidad de terminos es el numero que se introduce por parametro para hacer la funcion

    echo "La serie de Fibonacci con los primeros " . $cantidadTerminos . " términos es: ";
    echo implode(", ", $resultado); // Muestra la serie separada por comas como resultado
    //echo implode convierte el array en un string con numeros separados por cómas
    
    //echo (serieFibonacci(10));
    
    ?>
</body>

</html>