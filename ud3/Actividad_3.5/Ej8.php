<!-- Desarrollo Web en Entorno Servidor-->
<!-- 8.- Realizar una página web llamada ejercicio8.html que contenga un formulario con dos
cuadros de texto y cuatro botones de radio según el siguiente esquema:
Al pulsar sobre el botón “Enviar datos”, cargará la página ejercicio8_datos.php que recibirá los
números enteros introducidos en el formulario y la operación a realizar con ellos como
parámetros, y mostrará el resultado de realizar la operación seleccionada sobre los dos
valores introducidos.
Por ejemplo, si se introdujo en los cuadros de texto del formulario el número 12 y el número
6, y se seleccionó la operación Cociente, al pulsar el botón Enviar datos, la página php que
carga mostrará: “El resultado de realizar el cociente de los números 12 y 6 es 2”-->
<?php
if (isset($_POST)) {
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $operacion = $_POST['operacion'];
    switch ($operacion) {
        case 'suma':
            echo "<p><strong>SUMA</strong></p>";
            $resultado = $num1 + $num2;
            echo "El resultado de sumar $num1 + $num2 es $resultado";
            break;
        case 'resta':
            echo "<p><strong>RESTA</strong></p>";
            $resultado = $num1 - $num2;
            echo "El resultado de restar $num1 - $num2 es $resultado";
            break;
        case 'producto':
            echo "<p><strong>PRODUCTO</strong></p>";
            $resultado = $num1 * $num2;
            echo "El resultado de multiplicar $num1 * $num2 es $resultado";
            break;
        case 'cociente':
            echo "<p><strong>COCIENTE</strong></p>";
            if ($num2 != 0) {
                (float)$resultado = $num1 / $num2;
                $resultado = number_format($resultado, 2);
                echo "El resultado de dividir $num1 / $num2 es $resultado";
                break;
            }else{
                echo "ERROR: El numero 2 introducido no puede ser igual a 0";
            }
    }
    echo "<br><br><a href='./Ejercicio8.html'>Volver a la página inicial</a>";
}
?>