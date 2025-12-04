<!DOCTYPE html>
<html>

<head>
    <title>Ejercicios Tipos de Datos</title>
</head>

<body>
    <h3>Ejercicios Tipos de Datos</h1>
    <h6> Ejercicio 5</h6>

    <?php
    /*Declara una variable con un mensaje de texto (por ejemplo, “Hola mundo”).
Muestra ese mismo mensaje usando echo, luego usando print_r y finalmente
usando var_dump para comparar las diferencias en la salida. Ejemplo de salida
esperada: echo/print_r muestran solo el texto; var_dump muestra también el tipo
y la longitud (string(10) "Hola mundo").*/
$mensaje="Hola mundo";
print("Uso del echo, muestra solo el texto:");
echo "\n $mensaje";

print("<br>Uso del print_r, muestra solo el texto:");
print_r(" $mensaje");

print("<br>Uso del var_dump, muestra también el tipo y la longitud:");
var_dump("$mensaje");


    ?>
</body>

</html>