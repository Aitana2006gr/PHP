<!-- Desarrollo Web en Entorno Servidor- 
 Ej: Validar datos en la misma página que el formulario-->
<!--5.- Realizar una página web completa llamada ejercicio5.html que contenga un formulario
con el método post con un cuadro de texto y un botón con el siguiente esquema:
Al pulsar sobre el botón “Enviar datos”, cargará la página ejercicio5_datos.php que recibirá
el número entero introducido en el formulario como parámetro e informará al usuario de si
es el número es par o impar.
Por ejemplo, si se introdujo en el cuadro de texto del formulario el número 7, al pulsar el
botón Enviar datos, la página php que carga mostrará el mensaje “El número 7 es impar”.
Además, la página ejercicio5_datos.php tendrá un enlace llamado Volver para volver a la
página inicial ejercicio5.html.-->

<?php
if(isset($_POST)){
$numero = $_POST['numero'];
if ($numero % 2 == 0)
    echo "El número $numero es par.";
else
    echo "El número $numero es impar.";
echo "<br><a href='./Ejercicio5.html'>Volver a la página inicial</a>";
}
?>