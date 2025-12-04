<!-- Desarrollo Web en Entorno Servidor- 
 Ej: Validar datos en la misma página que el formulario-->
<!--6.- Realizar una página web llamada ejercicio6.html que contenga un formulario con un
cuadro de texto y un botón con el siguiente esquema:
Al pulsar sobre el botón “Enviar datos”, cargará la página ejercicio6_datos.php que recibirá el
número entero introducido en el formulario como parámetro y mostrará la tabla de multiplicar
de ese número desde el 1 al 10.
Por ejemplo, si se introdujo en el cuadro de texto del formulario el número 7, al pulsar el
botón Enviar datos, la página php que carga mostrará:
Página 2 de 2
Donde “Volver” será un enlace a la página inicial ejercicio6.html-->

<?php
if (isset($_POST)) {
    $numero = $_POST['numero'];
    echo "<h2>TABLA DE MULTIPLICAR DEL $numero: </h2>";
    for ($i=1;$i<11;$i++){
        $resultado=$i*$numero;
        echo "$i X $numero = $resultado<br>";
    }
    echo "<br><a href='./Ejercicio6.html'>Volver a la página inicial</a>";
}else{
    echo "No se han recibido los datos";
}
?>