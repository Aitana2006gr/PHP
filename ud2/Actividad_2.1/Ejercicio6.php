<!DOCTYPE html>
<html>

<head>
    <title>Ejercicios Tipos de Datos</title>
</head>

<body>
    <h3>Tipos de Datos. Actividad 2.1</h3>
    <h4>Ejercicio 6</h4>
    <p>Practica printf: imprime<br>
        o Un entero con ceros a la izquierda a ancho 5. <br>
        o Un float con 2 decimales.<br>
        o Un texto alineado a la izquierda en un ancho de 10 caracteres.<br>
        Muestra cada línea con un mensaje previo usando echo.<br>
        Objetivo: dominar especificadores de formato. <br>
    </p>
    <?php
    
    $entero = 73;
    $float = 1.2791173;
    $texto = "Rayos y centellas, pescados y sirenas";

    echo "Entero con ceros a la izquierda: ";
    printf("%05d", $entero); //%05d - Entero con al menos 5 dígitos, rellenando con ceros por la izquierda
    echo "<br>";
    echo "Float con 2 decimales: ";
    printf("%.2f", $float); //%.2f - Float con 2 decimales. El punto indica el separador decimal y el número, los decimales
    echo "<br>";
    echo "Texto alineado a la izquierda: <br>";
    printf("%-10s", $texto); //%-10s - Texto alineado a la izquierda en un ancho de 10 caracteres
    //%10s    - Reserva mínimo 10 caracteres, añadiendo espacios a la izquierda si es necesario
    //%-10s   -10 caracteres alineado a la izquierda, espacios a la derecha
    //%010d   -10 dígitos rellenando con ceros por la izquierda
    echo "<br><br>Aitana";
    ?>
</body>

</html>