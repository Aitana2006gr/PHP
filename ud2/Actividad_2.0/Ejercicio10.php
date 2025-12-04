<!DOCTYPE html>
<html>

<head>
    <title>Ejercicios Tipos de Datos</title>
</head>

<body>
    <h3>Tipos de Datos. Actividad 2.0</h3>
    <h4>Ejercicio 10</h4>
    <p>Crea una función que lleve un conteo de cuántas veces es llamada usando una variable estática (static).<br>
        Cada vez que se ejecute, incrementa el contador y muestra el número de llamada con echo.<br>
        Llama a la función varias veces y observa cómo cambia el contador.<br>
        Ejemplo de salida esperada: <br>
        Llamada 1, Llamada 2, Llamada 3. <br>
    </p>
    <?php

    function contadorLlamadas() {
        static $contador = 0; // variable estática para mantener el conteo
        $contador++; // incrementar el contador
        echo "Llamada $contador<br>"; // mostrar el número de llamada
    }
    // llamo a la función varias veces
    contadorLlamadas();
    contadorLlamadas();
    contadorLlamadas();
    echo "<br><br>Aitana";
    ?>
</body>

</html>