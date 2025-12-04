<!DOCTYPE html>
<html>

<head>
    <title>Ejercicios Tipos de Datos</title>
</head>

<body>
    <h1>Ejercicios Tipos de Datos</h1>

    <?php
    /*Repite el ejercicio anterior pero esta vez, dentro de la función, usa la palabra clave
global para acceder a la variable externa y modifícala (por ejemplo, añadiendo
más texto). Muestra el valor antes de llamar a la función y después de llamarla con echo para ver el cambio. Ejemplo de salida esperada: Antes: Hola; Después: Hola
desde la función. 
*/
    $mensaje = "Mensaje fuera"; // variable fuera de la función

echo "Antes: $mensaje<br>";

function mostrarMensaje() {
    global $mensaje; // Se usa la palabra "global" para acceder a la variable externa
    $mensaje .= " desde la función"; // modificar la variable, el punto sirve como + para añadir mas texto a la función de antes.
}

mostrarMensaje();

echo "Después: $mensaje<br>";
?>
</body>

</html>