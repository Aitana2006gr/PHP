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
*/

// Inicio de sesion para habilitar variables de sesion
session_start();

// Generar un número aleatorio entre 1 y 100 si no existe en la sesión
// Si existe, significa que ya estamos en medio de una partida
if (!isset($_SESSION['numero_a_adivinar'])) {
    // Almacenamos en la variable de sesion el numero a adivinar
    $_SESSION['numero_a_adivinar'] = rand(1, 100);
     // Inicializamos el contador de intentos
    $_SESSION['intentos'] = 0;
}

$mensaje = "¡Que comience el juego!";

// Funciones complementarias
function adivinarNumero ($numero_usuario) {
    $numero_a_adivinar = $_SESSION['numero_a_adivinar'];
    if ($numero_usuario < $numero_a_adivinar) {
        $mensaje = "<p style=color:red>Demasiado bajo. Intenta con un número mayor. Numero de intentos:" . $_SESSION['intentos'] . "</p>";
        return $mensaje;
    } elseif ($numero_usuario > $numero_a_adivinar) {
        $mensaje = "<p style=color:red>Demasiado alto. Intenta con un número menor. Numero de intentos:" . $_SESSION['intentos'] . "</p>";
        return $mensaje;
    } else {
        $mensaje = "<p style=color:green>¡Felicidades! Has adivinado el número " . $numero_a_adivinar . " en " . $_SESSION['intentos'] . " intentos.</p>";
        return $mensaje;
    }
}

// Comprobamos que se ha enviado un número desde el formulario
if (isset($_POST['numero'])) {
    // Asignar el número del actual intento a una variable
    $numero_usuario = ($_POST['numero']);
    // Incrementar el contador de intentos
    $_SESSION['intentos']++; 

    // Llamar a la función para comprobar el número y obtener el mensaje que mostraremos en el div
    $mensaje = adivinarNumero($numero_usuario);

    // Si ha acertado, reiniciamos la partida
    if ($numero_usuario == $_SESSION['numero_a_adivinar']) {
        session_destroy();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    </div>
</body>
</html>
