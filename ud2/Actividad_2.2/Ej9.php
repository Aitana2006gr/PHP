<!DOCTYPE html>
<html>

<head>
    <title>Ejercicios Tipos de Datos</title>
</head>

<body>
    <h2>Tipos de Datos. Actividad 2.1</h2>
    <h3>Ejercicio 9</h3>

    <?php
    /*9. Constantes (definición y uso):
    o Define una constante PI con valor 3.1416.
    o Calcula el área de un círculo de radio 5 y muéstrala.*/
    define("PI", 3.1416); // definición de constante
    $radio = 5;
    $area = PI * $radio * $radio;
    echo "Área círculo (r=5): $area<hr>";
    ?>
</body>

</html>