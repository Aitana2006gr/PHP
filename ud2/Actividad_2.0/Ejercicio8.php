<!DOCTYPE html>
<html>

<head>
    <title>Ejercicios Tipos de Datos</title>
</head>

<body>
    <h3>Tipos de Datos. Actividad 2.0</h3>
    <h4>Ejercicio 8</h4>
    <p>Repite el ejercicio anterior pero esta vez, dentro de la función, usa la palabra clave global<br>
        para acceder a la variable externa y modifícala (por ejemplo, añadiendo más texto).<br>
        Muestra el valor antes de llamar a la función y después de llamarla con echo para ver el cambio. <br>
        Ejemplo de salida esperada: <br>
        Antes: Hola; Después: Hola desde la función.
    </p>

    <?php
    //Variable fuera de la función
    $mensaje = "Mensaje fuera"; 

    echo "Antes: $mensaje<br>";

    function mostrarMensaje()
    {
        global $mensaje; // Se usa la palabra "global" para acceder a la variable externa
        $mensaje .= " desde la función"; // modificar la variable, el punto sirve como + para añadir mas texto a la función de antes.
    }

    mostrarMensaje();

    echo "Después: $mensaje<br>";
    echo "<br><br>Aitana";
    ?>
</body>

</html>