<?php
// funciones/login.php
session_start();

require_once __DIR__ . '/../clases/BD.php';

$mensajeError = "";

//Comprobar campos si estan vacíos
function validarCampos($usuario, $contrasena) {
    if (empty($usuario) || empty($contrasena)) {
        return "ERROR: Tienes que introducir un usuario y una contraseña.";
    }
    return "";
}

//Función logarse, recoge los campos y los asigna en las variables, también valida y hace consulta a la BD
function logearse() {
    global $mensajeError;
    if (isset($_POST["enviar"])) {
        $usuario = trim($_POST["usuario"]);
        $contrasena = $_POST["contraseña"];

        $mensajeError = validarCampos($usuario, $contrasena);
        if ($mensajeError === "") {
            if (BD::consulta_usuarios($usuario, $contrasena)) {
                $_SESSION['usuario'] = $usuario;
                header("Location: productos.php");
                exit();
            } else {
                $mensajeError = "ERROR: Usuario o contraseña incorrectos.";
            }
        }
    }
}
//Ejecuto la función
logearse();
?>
<!--Misma parte visual que en la verisión normal-->
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="../estilos/tienda.css">
</head>
<body class="login-body">

    <div id="form_seleccion">
        <h2><strong>Login</strong></h2>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <fieldset>
                <label for="usuario">Usuario:</label>
                <input type="text" name="usuario" required value="<?php echo isset($_POST['usuario']) ? htmlspecialchars($_POST['usuario']) : ''; ?>" /><br>
                <label for="contraseña">Contraseña:</label>
                <input type="password" name="contraseña" required /><br>
                <?php
                if (!empty($mensajeError)) {
                    echo "<p class='error'>" . htmlspecialchars($mensajeError) . "</p>";
                }
                ?>
                <input type="submit" name="enviar" value="Enviar">
            </fieldset>
        </form>
    </div>

</body>
</html>
