<!DOCTYPE html>
<html>

<head>
    <title>Ejercicios Tipos de Datos</title>
</head>

<body>
    <h2>Tipos de Datos. Actividad 2.1</h2>
    <h3>Ejercicio 1</h3>

    <?php
    /*20. Ámbito estático y operadores combinados:
• Crea una función acumular($n) que use una variable estática $total 
inicializada a 0.
• En cada llamada, haz $total += $n y devuelve $total.
• Llama a acumular(5), acumular(10) y acumular(-3), mostrando el resultado 
de cada llamada.
• Añade un breve comentario sobre cómo se conserva el valor entre 
llamadas*/
    function acumular($n)
    {
        static $total = 0;
        $total += $n;
        return $total;
    }
    echo acumular(5) . "<br>";
    echo acumular(10) . "<br>";
    echo acumular(-3) . "<br>";
    echo "La variable estática conserva su valor entre llamadas.";
    //La variable estática conserva su valor entre llamadas a la función
    ?>
</body>

</html>