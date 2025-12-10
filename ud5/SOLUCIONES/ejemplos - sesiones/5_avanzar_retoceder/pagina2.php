<?php
session_start();
if (isset($_POST['enviar'])) {
    if (!empty($_POST['nombre']) && !empty($_POST['apellido'])) {
        $_SESSION['nombre'] = $_POST['nombre'];
        $_SESSION['apellido'] = $_POST['apellido'];
    }
}
$genero = isset($_SESSION['genero']) ? $_SESSION['genero'] : "";
$formaenvio = isset($_SESSION['formaenvio']) ? $_SESSION['formaenvio'] : "";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Formulario 2</h1>
        <form action="pagina3.php" method="post">
            Genero:
            <input type='radio' name='genero' value='Hombre' <?php if($genero=="Hombre") echo "checked" ?>>Hombre
            <input type='radio' name='genero' value='Mujer'<?php if($genero=="Mujer") echo "checked" ?>>Mujer         
            <br><br>
            Forma de envio:
			<select name="formaenvio">  
                <option value='Correo' <?php if($formaenvio=="Correo") echo "selected" ?>>Correo</option>
                <option value='Seur'<?php if($formaenvio=="Seur") echo "selected" ?>>Seur</option>
            </select>
            <br><br>
            <a href="pagina1.php">Volver</a>
            <input type="submit" name="enviar2" value="Siguiente">        
        </form>
    </body>
</html>
