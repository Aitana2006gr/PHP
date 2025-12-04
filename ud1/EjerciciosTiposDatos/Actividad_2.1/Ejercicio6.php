<!DOCTYPE html>
<html>

<head>
    <title>Ejercicios Tipos de Datos</title>
</head>

<body>
    <h3>Tipos de Datos. Actividad 2.1</h3>
    <h4>Ejercicio 6</h4>

    <?php
    /*Practica printf: imprime
o Un entero con ceros a la izquierda a ancho 5.
o Un float con 2 decimales.
o Un texto alineado a la izquierda en un ancho de 10 caracteres. Muestra cada
línea con un mensaje previo usando echo. Objetivo: dominar
especificadores de formato.
*/
$entero=73;
$float=1.86389;
$texto="Rayos y centellas, pescados y sirenas";
echo "Entero con ceros a la izquierda: ";
printf("%05d\n", $entero);
echo"<br>";
echo "Float con 2 decimales: ";
printf("%.2f\n", $float);
echo"<br>";
echo "Texto alineado a la izquierda: <br>";
printf("%-10s\n", $texto);
//%10s    - Reserva mínimo 10 caracteres, añadiendo espacios a la izquierda si es necesario
//%-10s   -10 caracteres alineado a la izquierda, espacios a la derecha
//%010d   -10 dígitos rellenando con ceros por la izquierda
    ?>
</body>
</html>