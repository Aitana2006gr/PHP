<?php
//Datos de Categorias
function getCategorias()
{
    $categorias = array(
        "C001" => "Electrónica",
        "C002" => "Alimentación",
        "C003" => "Ropa",
        "C004" => "Hogar",
        "C005" => "Deportes"
    );
    return $categorias;
}

function obtenerCategoria() {}

function cerrarSesion()
{
    //Destruimos la sesión
    session_destroy();
}

//Calcular el importe total de cada pedido
function calcularImporteTotal()
{
    $totalAcumulado = $_SESSION['totalAcumulado'];
    $total = 0;
    $precioUnitario = 0;
    $cantidad = 0;
    $operacion = $precioUnitario * $cantidad;
    $supera10Ud = false;
    $descuento = 0.05;

    if ($supera10Ud == false) {
        return $operacion;
    }

    if ($supera10Ud == true) {
        return $operacion * $descuento;
    }

    return $operacion;
}
