<!-- Tarea DWES04  -->

<?php
session_start();
 include_once 'funciones.php';


//Compruebo el numero de empleado
if (!isset($_SESSION['numero'])) {
    $_SESSION['numero'] = 1;
} else {
    //Si NO se pulso modificar se trata de unempleado nuevo y aumentamos ---------------
    if (!isset($_POST['modificar'])) {
        $_SESSION['numero'] ++;
    }
}

//Si pulsamos el botón modificar restamos el salario del total de la empresa
if (isset($_POST['modificar'])) {
    $_SESSION['empresa'] -= $_SESSION['pago'];
}


//Si se pulsa el botón otro limpiamos los campos del formulario
if (isset($_POST['otro'])) {
	// guardamos el último empleado
	$_SESSION['lista'][$_SESSION['nombre']]=$_SESSION['sueldo'];
	//  limpiamos sesión para el nuevo
	unset ($_SESSION['nombre']);
	unset ($_SESSION['sueldo'] );
	unset ($_SESSION['dto']);
	unset ($_SESSION['hijos']) ;
	unset ($_SESSION['extra']);
}

//variables para mostrar en el formulario -----------------------
$nombre = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : "";
$sueldo = isset($_SESSION['sueldo']) ? $_SESSION['sueldo'] : "";
$dto =    isset($_SESSION['dto'])    ? $_SESSION['dto']    : "";
$extra=   isset($_SESSION['extra'])  ? $_SESSION['extra']  : "";
$hijos =  isset($_SESSION['hijos'])  ? $_SESSION['hijos']  : "";
?>


<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Tarea DWES04 REPASO. nomina.php. Javier López Cuesta</title>
    </head>
    <body>
        <div>
            <h1>Datos del empleado Nº <?php echo $_SESSION['numero'] ?></h1>
            <form action="resultado.php" autocomplete="on" method="post">
                <p>Nombre del empleado: <input type="text" name="nombre" value="<?php echo $nombre ?>" required></p>
                <p>Sueldo Base: <input type="text" name="sueldo" value="<?php echo $sueldo ?>"required> </p>
                <p>DTO: <input type="text" name="dto" value="<?php echo $dto ?>"></p>
                <p>Extras: 
                   <?php
                 	dibujarExtras();
				   ?>
                </p>
                <p>Hijos: 
                    <?php
						dibujarHijos();
                    ?>
                </p>
                <p><input type="submit" name="calcular" value="calcular nómina"></p>
            </form>
            <form action="listado.php" method="POST"><input type="submit" value="CERRAR" name="cerrar"/></form><br/>
        </div>
    </body>
</html>

