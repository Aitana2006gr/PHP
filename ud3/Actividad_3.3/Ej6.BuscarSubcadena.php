<?php
echo "<h2>Ejercicio 6: Buscar subcadena en array</h2>";
$palabras = ["desarrollador", "diseñador", "programador", "analista", "desarrolladora"];
$buscar = "desar";

echo "Array original:<br>";
print_r($palabras);
echo "<br><br>Subcadena a buscar: $buscar<br>";

function buscarCoincidencias($array, $subcadena) {
    $resultado = [];
    $subcadena = strtolower($subcadena);// pasamos a minusculas para buscar sin importar mayusculas o minusculas
    foreach ($array as $cadena) {
        if (strpos(strtolower($cadena), $subcadena) !== false) {// strpos devuelve la posicion o false si no encuentra
            $resultado[] = $cadena;// si encuentra, añadimos al resultado a el array resultado
        }
    }
    return $resultado;
}

$resultado6 = buscarCoincidencias($palabras, $buscar);
echo "<br>Resultado:<br> ";
print_r($resultado6);
?>  