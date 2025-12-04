<?php
$cadenaTexto = "";
function validarContrasena($cadenaTexto)
{
    if (!longitudCorrecta($cadenaTexto)) {
        return false;
    }
    if (!tieneMinuscula($cadenaTexto)) {
        return false;
    }
    if (!tieneMayuscula($cadenaTexto)) {
        return false;
    }
    if (!tieneNumero($cadenaTexto)) {
        return false;
    }
    return true;
}
//strlen() funcion para  devolver la longitud del texto

function longitudCorrecta($cadenaTexto)
{
    $minCaracteres = 8;
    $longitud = strlen($cadenaTexto);
    if ($longitud >= $minCaracteres) {
        return true;
    } else {
        return false;
    }
}

function tieneMinuscula($cadenaTexto)
{
    return preg_match("/[a-z]/", $cadenaTexto) === 1;
} //comparar caracteres char a y char z between

function tieneMayuscula($cadenaTexto)
{
    return preg_match("/[A-Z]/", $cadenaTexto) === 1;
}

function tieneNumero($cadenaTexto)
{
    return preg_match("/[0-9]/", $cadenaTexto) === 1;
}


echo "=== VALIDOR DE CONTRASEÑAS ===<br>";
$pass = "Abc12345";
echo "Contraseña: '$pass'<br>";
echo "Longitud: " . strlen($pass) . " caracteres<br>";
echo "Tiene minúscula: " . (tieneMinuscula($pass) ? "si" : "no") . "<br>";
echo "Tiene mayúscula: " . (tieneMayuscula($pass) ? "si" : "no") . "<br>";
echo "Tiene numero: " . (tieneNumero($pass) ? "si" : "no") . "<br>";
echo "Estado: " . (validarContrasena($pass) ? "si" : "no") . "<br>";

if (validarContrasena($pass) == false) {
    echo "Contraseña no creada ";
} else {
    echo "Contraseña creada con éxito";
}
