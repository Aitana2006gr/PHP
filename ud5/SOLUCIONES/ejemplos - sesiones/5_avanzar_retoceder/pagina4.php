<?php
session_start();
if (isset($_POST['enviar3'])) {   
	if (isset($_POST['comentario'])) {
            $_SESSION['comentario'] = $_POST['comentario'];
        }
	if (isset($_POST['confirmacion'])) 
		{
			$_SESSION['confirmacion'] = $_POST['confirmacion'];
			$conf="SI<br>";
		}
		else {
			 $conf="NO<br>";
		     unset($_SESSION['confirmacion']);
		}
	
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Mostrar datos</h1>
        <?php
        echo "Nombre: ".$_SESSION['nombre']."<br>";
        echo "Apellido: ".$_SESSION['apellido']."<br>";
        echo "Genero: ".$_SESSION['genero']."<br>";
        echo "Forma de envio: ".$_SESSION['formaenvio']."<br>";		
        echo "Confirmacion: ". $conf;
		echo "Comentario: ".$_SESSION['comentario']."<br>";
        ?>
        <a href="pagina3.php">Volver</a>
    </body>
</html>