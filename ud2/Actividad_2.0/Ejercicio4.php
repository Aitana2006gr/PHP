<!DOCTYPE html>
<html>

<head>
    <title>Ejercicios Tipos de Datos</title>
</head>

<body>
    <h3>Tipos de Datos. Actividad 2.0</h3>
    <h4>Ejercicio 4</h4>
    <p>Declara una variable booleana que indique si un usuario tiene acceso (true o false). <br>
        Usando un if muy simple, muestra con echo “Acceso concedido” si es true
        o “Acceso denegado” si es false.<br>
        Prueba cambiando el valor y observa la diferencia. <br>
        Ejemplo de salida esperada: Acceso concedido <br></p>
    <?php
    //Variable booleana
    $ifAcceso = true;

    //Muestra del valor actual
    echo 'Variable actual $ifAcceso: ';
    echo var_dump($ifAcceso) . "<br>"; //

    //Estructura condicional if
    if ($ifAcceso == true) {
        echo "Acceso concedido";
    } else {
        echo "Acceso denegado";
    }
    echo "<br><br>Aitana";

    ?>
</body>

</html>