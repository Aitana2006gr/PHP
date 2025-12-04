
<?php
    function inserta_usuario($dwes){
        if (isset($_POST['usuario']) && isset($_POST['contrasena'] )) {
            $nuevo_usuario = $_POST['usuario'];
            $nueva_contrasena = md5($_POST['contrasena']);
            $sql_insert = "INSERT INTO usuarios (usuario, contrasena) VALUES (:usuario, :contrasena)";
            $stmt = $dwes->prepare($sql_insert);
            $stmt->bindParam(':usuario', $nuevo_usuario);
            $stmt->bindParam(':contrasena', $nueva_contrasena);
            $stmt->execute();
            echo "<p>Usuario " . htmlspecialchars($nuevo_usuario) . " dado de alta correctamente.</p>";
            unset($stmt);
        }
    }
    function lista_usuarios($dwes){
        $sql = "SELECT usuario FROM usuarios";
        $resultado = $dwes->query($sql);

        echo "<ul>";
        while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
            echo "<li>" . htmlspecialchars($fila['usuario']) . "</li>";
        }
        echo "</ul>";

        unset($resultado);
    }
?>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Gestión de Usuarios</title>
        <link href="dwes.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <h1>Gestión de Usuarios</h1>

        <h2>Listado de Usuarios</h2>
        <?php
            try {
                $dwes = new PDO("mysql:host=localhost;dbname=dwes", "gestor", "secreto");
                $dwes->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                inserta_usuario($dwes);
                lista_usuarios($dwes);
                unset($dwes);
            } catch (PDOException $e) {
                echo "Error en la conexión: " . $e->getMessage();
            }
        ?>

        <h2>Alta de Nuevo Usuario</h2>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <label for="usuario">Usuario:</label>
            <input type="text" id="usuario" name="usuario" required><br><br>

            <label for="contrasena">Contraseña:</label>
            <input type="password" id="contrasena" name="contrasena" required><br><br>

            <input type="submit" value="Dar de Alta">
        </form>
    </body>
</html>

