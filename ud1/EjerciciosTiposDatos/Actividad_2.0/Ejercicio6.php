<!DOCTYPE html>
<html>

<head>
    <title>Ejercicios Tipos de Datos</title>
</head>

<body>
    <h1>Ejercicios Tipos de Datos</h1>

    <?php
    /*Declara una variable string que contenga un número, por ejemplo "42". Muestra su
tipo con var_dump. Convierte ese string a entero y súmale 8. Muestra el resultado
con echo y vuelve a usar var_dump para comprobar el cambio de tipo. Ejemplo de
salida esperada: Antes: string(2) "42"; Después: int(50).*/ 
$numero="42"; //numero en formato string
echo "Antes: ";
var_dump($numero);

$numero= (int)$numero + 8; //string a entero y suma de 8
echo "<br>Después: $numero";
var_dump($numero);

    ?>
</body>

</html>