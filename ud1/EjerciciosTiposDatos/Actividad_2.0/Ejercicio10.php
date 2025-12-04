<!DOCTYPE html>
<html>

<head>
    <title>Ejercicios Tipos de Datos</title>
</head>

<body>
    <h1>Ejercicios Tipos de Datos</h1>

    <?php
    /*Crea una función que lleve un conteo de cuántas veces es llamada usando una
variable estática (static). Cada vez que se ejecute, incrementa el contador y
muestra el número de llamada con echo. Llama a la función varias veces y
observa cómo cambia el contador. Ejemplo de salida esperada: Llamada 1,
Llamada 2, Llamada 3.
*/
function contadorLlamadas() {
    static $contador = 0; // variable estática para mantener el conteo
    $contador++; // incrementar el contador
    echo "Llamada $contador<br>"; // mostrar el número de llamada
}
// Llamar a la función varias veces
contadorLlamadas(); 
contadorLlamadas();
contadorLlamadas();
?>
</body>

</html>