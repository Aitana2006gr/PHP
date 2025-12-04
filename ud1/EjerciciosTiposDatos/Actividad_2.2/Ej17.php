<!DOCTYPE html>
<html>

<head>
    <title>Ejercicios Tipos de Datos</title>
</head>

<body>
    <h2>Tipos de Datos. Actividad 2.2</h2>
    <h3>Ejercicio 17</h3>

    <?php
    /*17. Comprobación y alcance de constantes:
    • Si la constante DEBUG no existe, defínela con valor true.
    • Crea una función mostrarDebug() que imprima un mensaje distinto según el 
    valor de DEBUG.
    • Invoca la función y comprueba que la constante es accesible dentro de la 
    función.*/
    if (!defined('DEBUG')) define('DEBUG', true);
    function mostrarDebug()
    {
        if (DEBUG) echo "Debug activo<br>";
        else echo "Debug desactivado<br>";
    }
    mostrarDebug();
    echo "<hr>";


    ?>
</body>

</html>