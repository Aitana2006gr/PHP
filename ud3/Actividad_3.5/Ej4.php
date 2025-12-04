<!--4.- El formulario realizado en el ejercicio2 con el método GET modifícalo para que llame al
ejercicio4.php y en este ejercicio4 en vez de utilizar la variable $_GET utiliza la variable
$_REQUEST.-->
<?php
if(isset($_REQUEST['enviar'])){
echo "<h2>Datos recibidos (usando REQUEST)</h2>";
echo "Nombre: " . $_REQUEST['nombre'] . "<br>"; //request tiene ambas variables, las del post y el get
echo "Módulo: " . $_REQUEST['curso'] . "<br>";
}
?>
