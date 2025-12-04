<!DOCTYPE html>
<html>

<head>
    <title>Ejercicios Tipos de Datos</title>
</head>

<body>
    <h3>Tipos de Datos. Actividad 2.0</h3>
    <h4>Ejercicio 5</h4>
    <p>Declara una variable con un mensaje de texto (por ejemplo, “Hola mundo”). <br>
        Muestra ese mismo mensaje usando echo, luego usando print_r y finalmente
        usando var_dump para comparar las diferencias en la salida. <br>
        Ejemplo de salida esperada: <br>
         echo/print_r muestran solo el texto; var_dump muestra también el tipo
        y la longitud (string(10) "Hola mundo").
    </p>
    <?php
    //Variable con mensaje de texto
    $mensaje = "Hola mundo";

    //Muestra del mensaje con las tres funciones
    echo "Muestro el mensaje usando echo: "; //Muestra solo el texto
    echo $mensaje."<br>";

    echo "Muestro el mensaje usando print_r: "; //Muestra solo el texto
    print_r($mensaje."<br>");

    //La diferencia entre echo y print_r es que print_r puede mostrar arrays y objetos, echo no.
    
    echo "Muestro el mensaje usando var_dump: "; //Muestra tipo, longitud y valor
    var_dump($mensaje);
    echo "<br><br>Aitana";
    ?>
</body>

</html>