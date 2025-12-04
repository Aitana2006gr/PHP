<!DOCTYPE html>
<html>

<head>
    <title>Ejercicios Tipos de Datos</title>
</head>

<body>
    <h3>Tipos de Datos. Actividad 2.1</h3>
    <h4>Ejercicio 3</h4>
    <p>Declara $s = "42.7" (string). Usa settype($s, "integer") y muestra el nuevo tipo y valor con printf y gettype.<br>
        Repite partiendo de "42.7" para convertirlo a float. Objetivo: practicar conversiones de tipo.<br>
    </p>

    <?php
    //
    $s = "42.7";
    settype($s, "integer"); // Settype cambia el tipo de la variable. En este caso, convierte la cadena a entero 
    printf("Tipo: %s, Valor: %d <br>", gettype($s), $s);
    //El formato %s para strings y %d es para enteros.

    $s = "42.7";
    settype($s, "float"); // Convierte la cadena a float
    printf("Tipo: %s, Valor: %.1f <br>", gettype($s), $s);
    //El formato %.1f es para float con un decimal.
    
    echo "<br><br>Aitana";
    ?>
</body>

</html>