<?php
echo "<h2>Ejercicio 5: Frecuencia de palabras</h2>";

function frecuenciaPalabras($texto)
{
    // Convertir a minúsculas
    $texto = strtolower($texto);

    // Eliminar signos de puntuación
    $texto = preg_replace('/[^\w\s]/', '', $texto);

    // Dividir en palabras
    $palabras = explode(' ', $texto);

    // Contar frecuencias
    $frecuencia = [];
    foreach ($palabras as $palabra) {
        $palabra = trim($palabra);
        if ($palabra != '') {
            if (isset($frecuencia[$palabra])) {
                $frecuencia[$palabra]++;
            } else {
                $frecuencia[$palabra] = 1;
            }
        }
    }

    return $frecuencia;
}

    $texto = "PHP es genial. PHP es poderoso y PHP es flexible.";
    print_r(frecuenciaPalabras($texto));
    echo "<br>";

?>
