<!DOCTYPE html>
<html>

<head>
    <title>Ejercicios Tipos de Datos</title>
</head>

<body>
    <h2>Tipos de Datos. Actividad 2.1</h2>
    <h3>Ejercicio 2</h3>

    <?php
    /*Declara una variable $x sin asignarle valor. Comprueba su estado con isset y is_null
    usando printf. Asigna un valor a $x, vuelve a comprobar; luego haz unset($x) y
    verifica otra vez con isset antes de intentar mostrar su tipo. Objetivo: entender
    existencia y nulidad.
    */
    $variableSinValor;
    //printf imprime una cadena formateada. d% es para mostrar numeros enteros.
    printf("Variable".$variableSinValor."isset: %d, is_null: %d <br>", isset($variableSinValor), is_null($variableSinValor));
    isset($variableSinValor); //Comprueba si la variable está definida y no es null. Devuelve true (1) o false (0).
    is_null($variableSinValor);//Comprueba si la variable es null. Devuelve true (1) o false (0).

    print("Tipo Null: $tipoNull <br>");

    //variable sin asignar
    /* $x
    printf("variable".$x."sin asignar- isset:%s, is null")*/
    //hacer con variable sin asignar y con variable asignada, la misma operacion 
    ?>
</body>

</html>