<!-- Desarrollo Web en Entorno Servidor- 
Ej: Validar datos en la misma página que el formulario-->
<!--7.- Realizar una página web llamada ejercicio7.html que contenga un formulario con dos
cuadros de texto y un botón con el siguiente esquema:
Al pulsar sobre el botón “Enviar datos”, cargará la página ejercicio7_datos.php que recibirá los
números enteros introducidos en el formulario como parámetros y mostrará una lista de
pares de números así: desde el menor hasta el mayor el primer número del par, y desde el
mayor hasta el menor el segundo número del par.
Por ejemplo, si se introdujo en los cuadros de texto del formulario el número menor 2 y el
número mayor 8, al pulsar el botón Enviar datos, la página php que carga mostrará:
Donde “Volver” será un enlace a la página inicial ejercicio7.html.-->
<?php
if (isset($_POST)) {
    $menor = $_POST['nMenor'];
    $mayor = $_POST['nMayor'];

    //hacer tambien comprobacion de si es menor o mayor
    echo "<h2>LISTA DE PARES DE NÚMEROS DE $menor Y $mayor:</h2>";
    if ($menor < $mayor) {
        for ($final = $mayor; $menor <= $final; $menor++ && $mayor--) {
            echo "($menor, $mayor)<br>";
        }
    }else{
        echo "El primer número debe ser menor que el segundo.";
    }
    echo "<br><a href='./Ejercicio7.html'>Volver a la página inicial</a>";
} else {
    echo "No se han recibido datos del formulario.";
}
?>