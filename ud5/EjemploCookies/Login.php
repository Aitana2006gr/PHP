<!DOCTYPE html>
<html>

<head id="encabezado">
    <title>Ejemplo de autentificación</title>
</head>

<body id="contenido">
    <?php
    //Incluimos la conexión con la base de datos
    require "Conexion.php"; 
    if (isset($_POST["enviar"])) {

        if (!$conexion) {
            echo "<p>ERROR: No se pudo conectar con la base de datos 'dwes'</p>";
        } else {

            $usuario = trim($_POST["usuario"]);
            $contrasena = trim($_POST["contrasena"]);

            // Validación campos vacíos
            if (empty($usuario) || empty($contrasena)) {
                echo "<p style='color:red'>ERROR: El usuario o la contraseña están vacíos</p>";
            } else {

                // Cifrado de la contraseña con md5
                $pass_cifrada = md5($contrasena);

                // Preparar inserción segura
                $insertar = $conexion->prepare('INSERT INTO usuarios (usuario, contrasena) VALUES (?, ?)');
                $insertar->bindParam(1, $usuario);
                $insertar->bindParam(2, $pass_cifrada);

                try {
                    $insertar->execute();
                    echo "<p style='color:green'>Usuario añadido correctamente</p>";
                } catch (PDOException $e) {
                    echo "<p style='color:red'>ERROR: No se pudo insertar el usuario. Puede que ya exista.</p>";
                }
            }
        }
    }
    ?>

    <h2>Listado de usuarios</h2>
    <?php
    // Mostrar usuarios registrados
    $sql = "SELECT usuario, contrasena FROM usuarios";
    $resultado = $conexion->query($sql);

    echo "<table border='1'>";
    echo "<tr><th>Usuario</th><th>Contraseña cifrada</th></tr>";

    while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($fila["usuario"]) . "</td>";
        echo "<td>" . htmlspecialchars($fila["contrasena"]) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    ?>

    <h2>Formulario alta de usuario</h2>
    <form id="form_seleccion" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        Usuario:<input type="text" name="usuario" required /><br><br>
        Contraseña:<input type="password" name="contrasena" required /><br><br>
        <input type="submit" name="enviar" value="Enviar">
    </form>

</body>

<footer id="pie">
</footer>

</html>
