<?php
//Comienzo la sesión
session_start();

//Pido el archivo una vez
require_once "_conexion.php";

//Mensaje error vacío
$mensajeError = "";

//Con esta función compruebo las credenciales para el inicio de sesión
function autentificarUsuario($conexion, $usuario, $contrasena)
{
    //Compruebo si no hay conexión
    if (!$conexion) {
        return "ERROR: No se ha podido conectar a la base de datos.";
    }
    //Consulta preparada y ejecución
    $sql = "SELECT usuario FROM usuarios WHERE usuario = :usuario AND contrasena = MD5(:password)";
    $sentencia = $conexion->prepare($sql);
    $sentencia->execute([":usuario" => $usuario, ":password" => $contrasena]);

    if ($sentencia->fetch()) { //Compruebo el resultado 
        return "";
    } else {
        return "ERROR: Usuario o contraseña incorrectos.";
    }
}

//Función para comprobar los campos de usuario y contraseña
function validarCampos($usuario, $contrasena)
{
    if (empty($usuario) || empty($contrasena)) { //Comprueba que no esten vacíos
        return "ERROR: Tienes que introducir un usuario y una contraseña.";
    }
    return ""; //Si todo esta correcto, no devuelve ningún mensaje
}

//Función para iniciar sesión presionando el botón y 
function logearse($conexion)
{
    $mensajeError = "";
    if (isset($_POST["enviar"])) {
        //Recibo los datos
        $usuario = trim($_POST["usuario"]);
        $contrasena = $_POST["contraseña"];

        $mensajeError = validarCampos($usuario, $contrasena); //Valido los campos

        if ($mensajeError === "") { //Si no hay mensajes de error
            $mensajeError = autentificarUsuario($conexion, $usuario, $contrasena);

            if ($mensajeError === "") {
                $_SESSION['usuario'] = $usuario; //Lo redirigo a la página de productos
                header("Location: productos.php");
                exit();
            }
        }
    }
    return $mensajeError;
}

if ($conexion) { 
    $mensajeError = logearse($conexion);
} else {
    $mensajeError = "ERROR: No se pudo establecer conexión con la base de datos.";
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./estilos/tienda.css">
</head>

<body class="login-body">

    <div id="form_seleccion">
        <h2><strong>Login</strong></h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <fieldset>
                <label for="usuario">Usuario:</label>
                <input type="text" name="usuario" required value="<?php echo isset($_POST['usuario']) ? htmlspecialchars($_POST['usuario']) : ''; ?>" /><br>
                <label for="contraseña">Contraseña:</label>
                <input type="password" name="contraseña" required /><br>
                <?php
                if (!empty($mensajeError)) { //Para los errores, lo he colocado aquí porque me gusta que este en este sitio para visualizarlo
                    echo "<p class='error'>" . htmlspecialchars($mensajeError) . "</p>";
                }
                ?>
                <input type="submit" name="enviar" value="Enviar">
            </fieldset>
        </form>

    </div>
</body>

</html>