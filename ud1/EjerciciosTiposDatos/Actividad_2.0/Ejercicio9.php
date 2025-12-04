<!DOCTYPE html>
<html>

<head>
    <title>Ejercicios Tipos de Datos</title>
</head>

<body>
    <h1>Ejercicios Tipos de Datos</h1>

    <?php
    /*Demuestra la diferencia entre variables locales y globales con el mismo nombre:
declara una variable color con valor “azul” fuera de una función. Dentro de una
función, declara una variable color con valor “rojo” (sin usar global) y muéstrala
con echo. Luego, fuera de la función, muestra la variable original. Observa cómo
cambian. Ejemplo de salida esperada: Dentro: rojo; Fuera: azul. 
*/
$color="azul"; //variable externa
function mostrarColor(){
    $color="rojo"; //variable interna
    echo "Dentro de la función: $color<br>"; //muestra el color rojo
}
mostrarColor();
echo "Fuera de la función: $color<br>"; //muestra el color azul
?>
</body>

</html>