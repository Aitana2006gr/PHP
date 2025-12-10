<?php
/*
Descripción:
Crea un programa llamado preferencias.php que permita al usuario personalizar su experiencia 
de navegación mediante cookies. El sistema debe recordar las preferencias del usuario entre visitas.

Requisitos:

Preferencias a guardar:

Idioma (Español, Inglés, Francés)
Tema visual (Claro, Oscuro)
Cantidad de productos por página (10, 20, 50)
Funcionalidades:

Mostrar un formulario con las 3 preferencias
Al enviar el formulario, guardar las preferencias en cookies (duración: 30 días)
Mostrar las preferencias actuales del usuario en la parte superior de la página
Botón para "Restablecer preferencias" que elimine todas las cookies
Si es la primera visita, mostrar valores por defecto (Español, Claro, 10)
Validaciones:

Verificar que los valores enviados sean válidos (usar arrays con opciones permitidas)
Usar htmlspecialchars() en todas las salidas
Detalles técnicos:

Las cookies deben tener nombres descriptivos: idioma_usuario, tema_usuario, items_pagina
Aplicar estilos CSS diferentes según el tema seleccionado (claro/oscuro)
Mostrar un mensaje de confirmación cuando se guarden las preferencias
*/


// ---- VARIABLES ----
// Definir opciones permitidas de preferencias para formulario
$opcionesIdioma = ['Español', 'Inglés', 'Francés'];
$opcionesTema = ['Claro', 'Oscuro'];
$opcionesItems = [10, 20, 50];


// ---- FUNCIONES ----
function mostrarPreferencias() {    
    // Verificamos si el usuario modifico las preferencias
    if (!isset($_COOKIE['preferenciasModificadas'])) {
        echo "<p>No hay preferencias establecidas. Usando valores por defecto.</p>";
        return;
    }
    
    // Accedemos a las variables seleccionadas por el usuario en cookies y asignamos
    $idioma = $_COOKIE['idiomaUsuario'];
    $tema = $_COOKIE['temaUsuario'];
    $items = $_COOKIE['itemsPagina'];

    // Mostramos las preferencias actuales
    echo "<h2>Preferencias actuales:</h2>";
    echo "<ul>";
    echo "<li>Idioma: " . htmlspecialchars($idioma) . "</li>";
    echo "<li>Tema: " . htmlspecialchars($tema) . "</li>";
    echo "<li>Productos por página: " . htmlspecialchars($items) . "</li>";
    echo "</ul>";
}

function establecerPreferencias($idioma, $tema, $items) {
    // Guardar las preferencias en cookies con duración de 30 días
    setcookie('idiomaUsuario', $idioma, time() + (30 * 24 * 60 * 60));
    setcookie('temaUsuario', $tema, time() + (30 * 24 * 60 * 60));
    setcookie('itemsPagina', $items, time() + (30 * 24 * 60 * 60));

    // Guardamos una bandera de que el usuario ha modificado las preferencias
    setcookie('preferenciasModificadas', '1', time() + (30 * 24 * 60 * 60));

    // Recargar la página para aplicar los cambios
    // Siempre que se modifiquen las cookies, recargamos la página para que se apliquen los cambios
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

function reestablecerPreferencias() {
    // Eliminar las cookies estableciendo una fecha de expiración en el pasado
    setcookie('idiomaUsuario', '', time() - 3600);
    setcookie('temaUsuario', '', time() - 3600);
    setcookie('itemsPagina', '', time() - 3600);
    setcookie('preferenciasModificadas', '', time() - 3600);
    
    // Recargar la página para aplicar los cambios
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}


// ---- LÓGICA DEL PROGRAMA ----
// Comprobar si se ha enviado el formulario para ejecutar las acciones correspondientes
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Comprobar si se ha enviado el formulario para restablecer preferencias
    if (isset($_POST['reset'])) {
        reestablecerPreferencias();
    } 

    // Comrobar si se han enviado las preferencias para guardarlas
    if (isset($_POST['idioma'], $_POST['tema'], $_POST['items'])) {
        // Obtener las preferencias seleccionadas
        $idiomaSeleccionado = $_POST['idioma'];
        $temaSeleccionado = $_POST['tema'];
        $itemsSeleccionados = $_POST['items'];

        establecerPreferencias($idiomaSeleccionado, $temaSeleccionado, $itemsSeleccionados);
    }
    
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 01 - Preferencias</title>
</head>
<body>
    <h2> Ejercicio de preferencias del Usuario</h2>
    <?php
        // Mostrar preferencias actuales
        mostrarPreferencias();
    ?>

    <h2> Configurar Preferencias</h2>
    <form method="POST" action="">
        <label for="idioma">Idioma:</label>
        <select name="idioma" id="idioma" required>
            <?php
                foreach ($opcionesIdioma as $idioma) {
                    echo '<option value="' . htmlspecialchars($idioma) . '">' . htmlspecialchars($idioma) . '</option>';
                }
            ?>
        </select>
        <select name="tema" id="tema" required>
            <?php
                foreach ($opcionesTema as $tema) {
                    echo '<option value="' . htmlspecialchars($tema) . '">' . htmlspecialchars($tema) . '</option>';
                }
            ?>
        </select>
        <select name="items" id="items" required>
            <?php
                foreach ($opcionesItems as $items) {
                    echo '<option value="' . htmlspecialchars($items) . '">' . htmlspecialchars($items) . '</option>';
                }
            ?>
        </select>
        <br><br>
        <input type="submit" value="Guardar preferencias">
    </form>
    <br><br>
    <form method="POST" action="">
        <input type="hidden" name="reset" value="1">
        <input type="submit" value="Restablecer preferencias">
    </form>
</body>
</html>