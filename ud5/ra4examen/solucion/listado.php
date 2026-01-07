<!-- Tarea DWES04 REPASO. listado.php  -->
<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Tarea DWES04. listado.php</title>
    </head>
    <body>
        <div>
            <?php
			
            //Cuando pulsamos el botón cerrar nos muestra la lista de nóminas calculadas
            if (isset($_POST['cerrar'])) {
                if (!empty($_SESSION['lista'])) {
                    echo "<h3>Nóminas del mes de los empleados</h3>";

                    foreach ($_SESSION['lista'] as $key => $value) {
                        echo "Nombre del empleado: <b>" . $key . "</b> Salario a percibir: <b>" . $value . " €</b><br>";
                    }
                } else {
                    echo "<h3>No hay ningún dato a mostrar</h4>";
                }
                //Destruimos la sesión
                session_destroy();
                
                //redirigir a nomina.php
				echo "<br><br><br>Volvemos a nomina.php......";
				header("refresh:5;url=nominas.php");
               
            }
            ?>

        </div>
    </body>
</html>