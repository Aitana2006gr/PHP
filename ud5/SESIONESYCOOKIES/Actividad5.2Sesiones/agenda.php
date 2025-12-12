<?php
/*
Utilizando variables de sesión, codificar el programa llamado agenda.php que sirva
para crear una lista de personas buscadas y mostrar sus números de teléfono.
Existe una agenda fija almacenada en un array asociativo que tiene la estructura
“titular”=>”teléfono” (con 6 personas).
Crear un formulario que tenga una caja de texto para pedir el nombre de un titular y
los botones “Buscar titular”, “Listado”” y “Cerrar”.
     El proceso consiste en teclear varios nombres pulsando el botón “Buscar
    titular”, mostrando el resultado de la búsqueda e almacenándolos en un array
    en la sesión. Si el titular no existe en la agenda se muestra el texto
    “DESCONOCIDO”.
     Cuando se pulsa en el botón “Listado” se hace un listado de los titulares que
    fueron tecleados y se muestra también su teléfono localizado en la agenda o
    “DESCONOCIDO”. En la búsqueda se utilizan funciones específicas de arrays.
     Si se pulsa el botón “Cerrar” se cancela la sesión y comienza una lista de
    búsqueda nueva.

*/

// Iniciar la sesión si no está iniciada
session_start();

// Array de agenda fija
$array_personas = [
    "Juan" => 652323123,
    "María" => 655556784,
    "Diego" => 655587652,
    "Ana" => 655543213,
    "Luis" => 655567894,
    "Sofía" => 655598761
];

// Variables para almacenar los resultados en sesion
if (!isset($_SESSION['mi_agenda'])) {
    $_SESSION['mi_agenda'] = [];
}
$resultado_accion = "";

// Funcion para mostrar el resultado de la busqueda del nombre y asignar el resultado en variables. Recibe el nombre y el array de la agenda
function mostrar_resultado($nombre, $array_personas)
{
    // Verifico con un regex que el nombre no tenga numeros ni simbolos
    if (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/", $nombre)) {
        echo "<p style=\"color: red\">El nombre no puede contener números ni símbolos.</p>";
        return;
    }
    if (empty($nombre)) {
        echo "<p style=\"color: red\">Por favor, ingrese un nombre para buscar.</p>";
        return;
    }

    // Comprobar si el nombre existe en las claves del array
    if (array_key_exists($nombre, $array_personas)) {
        // Almacenamos el nombre y el telefono en la variable de sesion
        $_SESSION['mi_agenda'][] = [$nombre, $array_personas[$nombre]];
        // Creamos una tabla con una fila con el nombre en una celda y el telefono en otra
        echo "<h3>Resultado de la búsqueda:</h3>";
        echo "<table border='1'><tr><th>Nombre</th><th>Teléfono</th></tr>";
        echo "<tr><td>$nombre</td><td>" . $array_personas[$nombre] . "</td></tr>";
    } else {
        // Almacenamos el nombre y el telefono como DESCONOCIDO en la variable de sesion
        $_SESSION['mi_agenda'][] = [$nombre, "DESCONOCIDO"];
        // Si no existe, mostramos el nombre y DESCONOCIDO
        echo "<h3>Resultado de la búsqueda:</h3>";
        echo "<table border='1'><tr><th>Nombre</th><th>Teléfono</th></tr>";
        echo "<tr><td>$nombre</td><td>DESCONOCIDO</td></tr>";
        echo "</table>";
    }
}

// Funcion para listar el resultado del contacto encontrado en la agenda
function listar_resultado()
{
    // Comprobamos que resultado no es nulo
    if ($_SESSION['mi_agenda'] == null) {
        echo "<p style=\"color: red\">No se han realizado búsquedas aún.</p>";
        // Terminamos la función
        return;
    }

    // Mostramos la tabla con los resultados almacenados en la sesión
    echo "<table border='1'><tr><th>Nombre</th><th>Teléfono</th></tr>";
    foreach ($_SESSION['mi_agenda'] as $resultado) {
        echo "<tr><td>" . $resultado[0] . "</td><td>" . $resultado[1] . "</td></tr>";
    }
    echo "</table>";
}

// Funcion para cerrar la sesion
function cerrar_sesion()
{
    // LIMPIAR las variables de sesión
    session_unset();
    // DESTRUIR la sesión (claves y valores)
    session_destroy();
    echo "<p style=\"color: red\">Sesión cerrada. Se ha liberado el espacio de la agenda.</p>";
}

// Compruebo si se ha enviado algun formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Aquí se manejarán las acciones del formulario
    if (isset($_POST['accion'])) {
        $accion = $_POST['accion'];
        $resultado_accion = $accion;
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda interactiva</title>
</head>

<body>
    <h1> Agenda Interactiva</h1>
    <h2> LOCALIZADOS </h2>
    <form action="agenda.php" method="post">
        <label for="titular">Nombre del titular:</label>
        <input type="text" id="titular" name="titular">
        <br><br>
        <input type="submit" name="accion" value="Buscar titular">
        <input type="submit" name="accion" value="Listado">
        <input type="submit" name="accion" value="Cerrar sesion">
    </form>
    <br>
    <div id="resultado">
        <?php
        // Comprobar que accion se ha seleccionado
        if ($resultado_accion == "Buscar titular") {
            // Obtener el nombre del formulario
            $nombre_buscado = trim($_POST['titular']);
            // Mostrar el resultado de la busqueda
            echo mostrar_resultado($nombre_buscado, $array_personas);
        }
        if ($resultado_accion == "Listado") {
            // Listar los resultados almacenados en la sesión
            echo "<h3>Listado de búsquedas realizadas:</h3>";
            listar_resultado();
        }
        if ($resultado_accion == "Cerrar sesion") {
            // Cerrar la sesión
            cerrar_sesion();
        }

        // Limpio la variable de accion
        $resultado_accion = "";
        /*CON UN SWITCH*/
        /*
        // Comprobar qué acción se ha seleccionado
        switch ($resultado_accion) {
            case "Buscar titular":
                // Obtener el nombre del formulario
                $nombre_buscado = trim($_POST['titular']);
                // Mostrar el resultado de la búsqueda
                echo mostrar_resultado($nombre_buscado, $array_personas);
                break;

            case "Listado":
                // Listar los resultados almacenados en la sesión
                echo "<h3>Listado de búsquedas realizadas:</h3>";
                listar_resultado();
                break;

            case "Cerrar sesion":
                // Cerrar la sesión
                cerrar_sesion();
                break;

            default:
                // Acción no reconocida (opcional)
                echo "Acción no válida.";
                break;
        }

        // Limpio la variable de acción
        $resultado_accion = "";
        */
        ?>
    </div>
</body>

</html>