<?php
// Datos de Conceptos Extra
function get_extras()
{
    return array(
        "Noche" => 100,
        "Festivo" => 60,
        "Hora" => 35,
        "Peligro" => 120,
        "Otros" => 70
    );
}

// Datos de Departamentos
function get_departamentos()
{
    return array(
        "D001" => "Contabilidad",
        "D002" => "Marketing",
        "D003" => "Ventas",
        "D004" => "Soporte Técnico",
        "D005" => "Recursos Humanos"
    );
}

// Función para Calcular la Nómina
function calcular_nomina($sueldo_base, $extras, $num_hijos)
{
    $sueldo_base;
}

// Función para Obtener el Nombre del Departamento
function obtener_departamento($clave_departamento)
{
    //TODO
}

// Función para Cerrar Sesión y Mostrar el Listado de Empleados
function cerrar_sesion()
{
    //Limpiar
    //$_SESSION['empleado'] = array();
    //$_SESSION['numEmpleado'] = array();
    //Destruye la sesión
    session_destroy();
    header('Location: nomina.php');
}
