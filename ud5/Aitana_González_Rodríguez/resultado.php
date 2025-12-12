<?php
session_start();
if($_SESSION['empleado']){
foreach ($_SESSION['empleado'] as $clave => $valor) {
    if($clave=="nombre"){
        echo $valor;
        return $valor;
    }
}
}else{echo "No está la sesión empleado";}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Resultado Nómina</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <div class="container2">
        <h2>Resultado de la Nómina</h2>
        <p><b>Nombre del Empleado: <?php ?></b> </p>
        <p><b>Sueldo Base:</b> TODO &euro;</p>
        <p><b>Departamento:</b> TODO</p>
        <p><b>Extras:</b></p>
        <ul>
            TODO
        </ul>
        <p><b>Importe por Hijos:</b> TODO </p>
        <p><b>Importe Total de la Nómina:</b> TODO &euro;</p>
        <br>
        <p><b>Total Acumulado de la Empresa:</b> TODO &euro;</p><br>

        <div class="form-buttons">
            <form action="nomina.php" method="post" style="display: inline;">
                <button type="submit" name="accion" value="modificar" class="btn btn-secondary">Modificar</button>
            </form>
            <form action="nomina.php" method="post" style="display: inline;">
                <button type="submit" name="accion" value="otro" class="btn btn-primary">Otro Empleado</button>
            </form>
        </div>
    </div>
</body>

</html>