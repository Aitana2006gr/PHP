<!-- Tarea DWES04  -->

<?php
session_start();
include_once 'funciones.php';

//Si se pulsó el botón calcular
if (isset($_POST['calcular'])) {
        $_SESSION['nombre'] = $_POST['nombre'];
        $_SESSION['sueldo'] = $_POST['sueldo'];
        $_SESSION['dto'] = $_POST['dto'];
        $_SESSION['hijos'] = $_POST['hijos'];
        // comprobar si se eligió alguna extra
        if (isset($_POST['extra'])) {
            $_SESSION['extra'] = $_POST['extra'];
         } else {
            $_SESSION['extra'] = array(); // ---- si no hay extras, tenemos un array vacio --
        }
        //Si no hay sesión el dinero a pagar por la empresa es 0
        if (!isset($_SESSION["empresa"])) {
            $_SESSION["empresa"] = 0;
        }
        // Si no existe la lista de empleados, la inicializamos
        if (!isset($_SESSION["lista"])) {
            $_SESSION["lista"] = array();
        }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Tarea DWES04 REPASO. resultado.php. Javier López Cuesta</title>
    </head>
    <body>
        <?php
        echo "Empleado: " . $_SESSION['nombre'] . "<br>";
        echo "El salario base es: " . $_SESSION['sueldo'] . "<br>";
        echo "Departamento: " . nombreDepartamento() . "<br>";
        echo "Relación de extras: <br>";
		if (count($_SESSION['extra'])>0){
			foreach ($_SESSION['extra'] as $ex => $value) {
				echo " <li> $ex :  $value </li>";
			}
		}
		else 
			echo "(********** No hay extras ***********<br>";
        echo "El número de hijos: " . $_SESSION['hijos'] . "<br>";
        echo "<p></p>";
		
		$_SESSION['pago']=calcularSalario();
        echo "El salario final a percibir es: " . $_SESSION['pago'] . "<br>";
		
		$_SESSION['empresa'] += $_SESSION['pago'];
        echo "TOTAL acumulado de nóminas: " . $_SESSION['empresa'] . "<br>";
        echo "<p></p>";
        ?>

        <form action="nominas.php" method="POST">
			<input type="submit" value="Modificar" name="modificar"/>
			<input type="submit" value="OTRO" name="otro"/>
		</form>
		<br/>
    </body>
</html>
