<!DOCTYPE html>
<html>

<head>
    <title>Ejercicios Tipos de Datos</title>
</head>

<body>
    <h3>Tipos de Datos. Actividad 2.1</h3>
    <h4>Ejercicio 2</h4>
    <p>Declara una variable $x sin asignarle valor. Comprueba su estado con isset y is_null usando printf. <br>
        Asigna un valor a $x, vuelve a comprobar; luego haz unset($x) y verifica otra vez con isset antes de intentar mostrar su tipo.<br>
        Objetivo: entender existencia y nulidad.
    </p>

    <?php
    //función de php para desactivar mensajes de error
    error_reporting(0);

    //variable sin asignar valor
    $x;
    echo "Variable sin asignar valor:<br>";
    //printf imprime una cadena formateada. d% es para mostrar numeros enteros.
    printf('Variable: $x ->'.$x."->isset: %d, is_null: %d <br>", isset($x), is_null($x));


    // isset: Comprueba si la variable está definida y no es null. Devuelve true (1) o false (0).
    // is_null: Comprueba si la variable es null. Devuelve true (1) o false (0).
    
    //asignar valor a la variable
    $x=73;
    echo "<br>Variable con valor asignado:<br>";
    printf('Variable: $x ->'.$x."->isset: %d, is_null: %d <br>", isset($x), is_null($x));
    echo "<br><br>Aitana";
    ?>
</body>

</html>