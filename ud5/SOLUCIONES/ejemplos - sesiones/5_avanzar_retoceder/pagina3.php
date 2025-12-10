<?php
session_start();
if(isset($_POST['enviar2'])){
    if(!empty($_POST['genero']) && !empty($_POST['formaenvio'])){
        $_SESSION['genero']=$_POST['genero'];
        $_SESSION['formaenvio']=$_POST['formaenvio'];
    }
}
$comentario= isset($_SESSION['comentario'])?$_SESSION['comentario']:"";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Formulario 3</h1>
        <form action="pagina4.php" method="post">
            Confirmacion: 
			<input type="checkbox" name="confirmacion" <?php if(isset($_SESSION['confirmacion'])) echo "checked" ?>>
			<br><br>
            Comentario: 
			<textarea name="comentario"><?php echo $comentario ?></textarea>
            <br><br>
            <a href="pagina2.php">Volver</a>
            <input type="submit" name="enviar3" value="Siguiente">
        </form>
    </body>
</html>
