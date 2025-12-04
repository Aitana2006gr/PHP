<!DOCTYPE html>
<html>

<head>
    <title>Ejercicios Tipos de Datos</title>
</head>

<body>
    <h1>Ejercicios Tipos de Datos</h1>

    <?php
    /*Practica el ámbito de variables: declara una variable mensaje fuera de cualquier
función con un texto simple. Crea una función que intente mostrar ese mensaje
con echo sin usar la palabra clave global. Llama a la función y luego muestra el
mensaje fuera de la función. Observa qué aparece dentro y fuera. Ejemplo de
salida esperada: Dentro de la función puede no mostrarse el valor; fuera sí. 
*/
$mensaje="Mensaje fuera de la función"; //variable fuera de la funcion 
function mostrarMensaje($mensaje){
    echo ($mensaje);
    //echo "Dentro de la función: $mensaje"; //no se puede acceder a la variable
    $mensaje="Hola desde la función";} //variable dentro de la funcion
    mostrarMensaje();
    ?>

</body>

</html>