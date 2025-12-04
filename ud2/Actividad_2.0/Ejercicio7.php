<!DOCTYPE html>
<html>

<head>
    <title>Ejercicios Tipos de Datos</title>
</head>

<body>
    <h3>Tipos de Datos. Actividad 2.0</h3>
    <h4>Ejercicio 7</h4>
    <p>Practica el ámbito de variables: declara una variable mensaje fuera de cualquier función con un texto simple.<br>
        Crea una función que intente mostrar ese mensaje con echo sin usar la palabra clave global.<br>
        Llama a la función y luego muestra el mensaje fuera de la función. <br>
        Ejemplo de salida esperada: <br>
        Dentro de la función puede no mostrarse el valor; fuera sí.
    </p>
    <?php

    //Variable fuera de la funcion
    $mensaje = "Mensaje fuera de la función";
    echo $mensaje."<br>"; //muestra la variable fuera de la funcion

    function mostrarMensaje($mensaje){
        $mensaje = "Hola desde la función";
        echo ($mensaje);
        //echo "Dentro de la función: $mensaje"; //no se puede acceder a la variable
      
    } //variable dentro de la funcion

    
    mostrarMensaje($mensaje);
    echo "<br><br>Aitana";
    ?>

</body>

</html>