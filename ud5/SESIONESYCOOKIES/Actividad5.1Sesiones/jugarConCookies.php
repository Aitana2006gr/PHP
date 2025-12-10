<?php
/*
Codifica un programa llamado jugar.php que sirva para jugar a adivinar un número. El
servidor genera un valor aleatorio entre 1 y 100, que hay que adivinar (visualiza el
número para hacer las pruebas).
Formato de la instrucción: $numero = rand(1,n);
El jugador debe introducir números hasta acertar. Cuando acierte se indica que el
juego a finalizado y muestra el contador con el número de intentos que ha necesitado.
En caso de fallo, el servidor le dará pistas para teclear un número mayor o menor
según el caso.

Se hara ahora con cookies.
*/

// IMPORTANTE, las cookies necesitan recargar la pagina para que se creen correctamente

// Generar un número aleatorio entre 1 y 100 si no existe en la cookie
// Si existe, significa que ya estamos en medio de una partida

// ---- VARIABLES ----
if (!isset($_COOKIE['numero_a_adivinar'])) {
    // Almacenamos en la cookie el numero a adivinar
    $numeroAAdivinar = rand(1, 100);
    setcookie('numero_a_adivinar', $numeroAAdivinar, time() + 3600); // Cookie válida por 1 hora
    // Inicializamos el contador de intentos
    setcookie('intentos', 0, time() + 3600); // Cookie válida por 1 hora
    header ("Location: jugarConCookies.php"); // Header sirve para recargar la pagina, necesario para crear las cookies
    exit();
}
$mensaje = "¡Que comience el juego!";


// ---- FUNCIONES ----
// Función para comprobar el número introducido por el usuario. devuelve un mensaje según el resultado
function adivinarNumero($numero_usuario) {
    $numero_a_adivinar = $_COOKIE['numero_a_adivinar'];
    // Incrementar el contador de intentos usando setcookie
    // No se puede incrementar directamente el valor de la cookie, hay que leer su valor, incrementarlo y volver a guardarlo
    $intentosActuales = $_COOKIE['intentos'] + 1;
    setcookie('intentos', $intentosActuales, time() + 3600); // Actualizar cookie con nuevo valor);
    $mensaje = "";

    if ($numero_usuario < $numero_a_adivinar) {
        $mensaje = "<p style=color:red>Demasiado bajo. Intenta con un número mayor. Numero de intentos:" . $intentosActuales . "</p>";
    } elseif ($numero_usuario > $numero_a_adivinar) {
        $mensaje = "<p style=color:red>Demasiado alto. Intenta con un número menor. Numero de intentos:" . $intentosActuales . "</p>";
    } else {
        $mensaje = "<p style=color:green>¡Felicidades! Has adivinado el número " . $numero_a_adivinar . " en " . $intentosActuales . " intentos.</p>";
        
        // DESTRUYO las cookies para reiniciar el juego
        setcookie('intentos', 0, time() - 3600);
        setcookie('numero_a_adivinar', 0, time() - 3600);
    }

    return $mensaje;
}

// ---- LÓGICA DEL PROGRAMA ----
// Comprobamos que se ha enviado un número desde el formulario
if (isset($_POST['numero'])) {
    // Asignar el número del actual intento a una variable
    $numero_usuario = ($_POST['numero']);

    // Llamar a la función para comprobar el número y obtener el mensaje que mostraremos en el div
    $mensaje = adivinarNumero($numero_usuario);

    /*// Si ha acertado, reiniciamos la partida
    if ($numero_usuario == $_COOKIE['numero_a_adivinar']) {
        unset($_COOKIE['numero_a_adivinar']);
        unset($_COOKIE['intentos']);
    } */
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio jugar con cookies</title>
</head>
<body>
    <h1>Juego de Adivinar el Número</h1>
    <!-- Formulario para pedir el número al usuario -->
    <form method="post" action="">
        <label for="numero">Adivina el número (entre 1 y 100):</label>
        <input type="number" id="numero" name="numero" min="1" max="100" required>
        <input type="submit" value="Enviar">
    </form>
    <!-- Salida que muestra el mensaje -->
    <div id="mensaje">
        <p><?php echo $mensaje; ?></p>

        <!-- Para pruebas, mostramos el numero a adivinar -->

        <?php 
        echo "<pre>";
        print_r($_COOKIE);
        echo "</pre>";
        ?>

    </div>
</body>
</html>
