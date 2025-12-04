<!DOCTYPE html>
<html>

<head>
    <title>Ejercicios Tipos de Datos</title>
</head>

<body>
    <h3>Tipos de Datos. Actividad 2.1</h3>
    <h4>Ejercicio 3</h4>

    <?php
    /*Declara $s = "42.7" (string). Usa settype($s, "integer") y muestra el nuevo tipo y valor
con printf y gettype. Repite partiendo de "42.7" para convertirlo a float. Objetivo:
practicar conversiones de tipo.*/
    $s = "42.7";
    settype($s, "integer"); 
    printf("Tipo: %s, Valor: %d <br>", gettype($s), $s);
    
    $s = "42.7";
    settype($s, "float");
    printf("Tipo: %s, Valor: %.1f <br>", gettype($s), $s);

    ?>
</body>

</html>