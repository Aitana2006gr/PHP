<!DOCTYPE html>
<html>

<head>
    <title>Ejercicios Tipos de Datos</title>
</head>

<body>
    <h2>Tipos de Datos. Actividad 2.2</h2>
    <h3>Ejercicio 18</h3>

    <?php
    /*18. Operador ternario y concatenación:
• Declara $edad con distintos valores de prueba (por ejemplo, 16 y 21).
• Usa el operador ternario para asignar a $tipo el texto "adulto" o "menor".
• Muestra el mensaje "Eres " . $tipo y repite con varios valores de $edad.*/
    foreach ([16, 21] as $edad) {
        $tipo = ($edad >= 18) ? "adulto" : "menor";
        echo "Edad $edad: Eres $tipo<br>";
    }

    ?>
</body>

</html>