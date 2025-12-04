<!DOCTYPE html>
<html>

<head>
    <title>Ejercicios Tipos de Datos</title>
</head>

<body>
    <h3>Tipos de Datos. Actividad 2.0</h3>
    <h4>Ejercicio 6</h4>
    <p>Declara una variable string que contenga un número, por ejemplo "42". <br>
        Muestra su tipo con var_dump. Convierte ese string a entero y súmale 8.<br>
        Muestra el resultado con echo y vuelve a usar var_dump para comprobar el cambio de tipo. <br>
        Ejemplo de salida esperada: <br>
        Antes: string(2) "42"; Después: int(50).
    </p>
    <?php
    //Variable string con número
    $numero = "42"; //numero en formato string
    echo "Antes: $numero <br>";
    echo var_dump($numero);

    //Conversión a entero y suma de 8
    $numero = (int)$numero + 8; //string a entero y suma de 8
    echo "<br>Después: $numero <br>";
    echo var_dump($numero);
    echo "<br><br>Aitana";
    ?>
</body>

</html>