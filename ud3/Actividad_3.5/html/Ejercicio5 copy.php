<html>
<head>
    <title>Ejemplo formulario</title>
</head>
<body>
<!--Los datos mas sensibles se debe usar en post, no queda en el historial ni en la cache.
Si usas get, es mas para búsquedas, lo tienes en la cache y en el historial.-->
<?php
if(isset($_POST['enviar'])){ //Aqui se procesa el formulario,  //aqui se pone $_GET tmb
    //una vez ya esta rellenado en la primera vez, la segunda se muestran los datos en este caso.
    echo "Datos del registro <br>";
    echo "------------------<br>";
    echo "Nombre: {$_POST['nombre']}<br>"; //Aqui tendria que cambiar a $_GET tmb si lo quiero probar
    echo "Email: {$_POST['email']}<br>";
    echo "Edad: {$_POST['edad']}<br>";
    echo "Pais: {$_POST['pais']}<br>";
    echo "Bio: {$_POST['bio']}<br>";
}else{ //La primera vez como no lo tiene ejecutado, aparece el formulario a rellenar, 
    //porque con el isset () se comprueba que no hay valores
?>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
<!--La ventaja de poner "<?php echo $_SERVER['PHP_SELF'];?>" en vez de poner el nombre del archivo 
Ej. Prueba.php, es que si le cambio el nombre, da igual ya que se llama a sí mismo-->
<!--El get va en la url, en texto plano y se puede cambiar, el post es invisible.-->
<!--Siempre se recogen todos los datos, aunque use el get y en la url salga todo, lo que muestro puede ser menos. Ejemplo la contraseña.-->
<!--Si pongo el method="GET", la url luego sale con todos los datoshttp://localhost/Actividad%203.5/html/Prueba.php?nombre=Aitana&email=aitana%40gmail.com&password=getgetget&edad=18&pais=es&bio=abc&acepto=on&enviar=-->
<!--En la parte de arriba, en los datos se recogen también con el -->
        <fieldset>
            <legend>Registro de Usuario</legend>
            <label for="nombre">Nombre:</label><br>
            <input type="text" id="nombre" name="nombre" required><br><br>
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br><br>
            <label for="password">Contraseña:</label><br>
            <input type="password" id="password" name="password" minlength="8" required><br><br>
            <label for="edad">Edad:</label><br>
            <input type="number" id="edad" name="edad" min="18" max="120"><br><br>
            <label for="pais">País:</label><br>
            <select id="pais" name="pais" required><br>
                <option value="">Selecciona...</option>
                <option value="es">España</option>
                <option value="mx">México</option>
            </select><br><br>
            <label for="bio">Biografía:</label><br>
            <textarea id="bio" name="bio" rows="4"></textarea><br><br>
            <label>
                <input type="checkbox" name="acepto" required>
                Acepto los términos
            </label><br><br>
            <button type="submit" name="enviar">Registrarse</button>
            <button type="reset">Limpiar</button>
        </fieldset>
    </form>
    <?php //por eso se le llama codigo espagueti, necesito cerrar aqui la llave 
    //de antes abierta para que me haga el formulario con html
}
    ?>
</body>

</html>