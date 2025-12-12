<?php
require_once "funciones.php";

session_start();
if (!isset($_SESSION['numEmpleado'])) {
    //Almaceno en la variable de sesion del numero del empleado

    $datosEmpleado = array(
        "nombre" => "",
        "sueldo" => 0,
        "clave" => "",
        "numHijos" => 0,
    );
    $_SESSION['empleado'] = $datosEmpleado;
    $_SESSION['numEmpleado'] = 1;
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Nómina Empleado <?php echo $_SESSION['numEmpleado'] ?></title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <div class="container1">
        <h2>Empleado Número: <?php echo $_SESSION['numEmpleado'] ?></h2>

        <!-- Mostrar mensajes de error si existen -->
        <?php
        ?>

        <!-- Formulario para Calcular Nómina -->
        <?php

        try {
            $nombre = $_POST["nombre"];
            $sueldo = $_POST["sueldo_base"];
            $clave = $_POST["clave_departamento"];
            $numHijos = $_POST["numHijos"];

            $_SESSION['numEmpleado'] = 1;
            $_SESSION['empleado'] = $datosEmpleado;
            $datosEmpleado = array(
                "nombre" => $nombre,
                "sueldo" => $sueldo,
                "clave" => $clave,
                "numHijos" => $numHijos,
            );
        } catch (Exception $e) {
            echo "Error: No funciona: "+ $e->getMessage();
        }

        ?>
        <div class="container2">
            <form action="resultado.php" method="post">
                <div class="form-group">
                    <label>Nombre del Empleado:</label>
                    <input type="text" name="nombre" value="" required>
                </div>

                <div class="form-group">
                    <label>Sueldo Base:</label>
                    <input type="number" name="sueldo_base" value="" required>
                </div>

                <div class="form-group">
                    <label>Clave de Departamento:</label>
                    <input type="text" name="clave_departamento" value="" required>
                </div>

                <div class="form-group extras-group">
                    <label>Conceptos Extra:</label>
                    <div class="extras">
                        <?php

                        $array = get_extras();
                        foreach ($array as $clave => $valor) {
                            echo '<input type="checkbox" name="extra" value="' . $valor . '">' . $clave . '</input>';
                        }
                        ?>
                    </div>
                </div>

                <div class="form-group hijos-group">
                    <label>Número de Hijos:</label>
                    <div class="hijos compact">
                        <input type="radio" name="numHijos" value="0"> 0</input>
                        <input type="radio" name="numHijos" value="1"> 1</input>
                        <input type="radio" name="numHijos" value="2"> 2</input>
                        <input type="radio" name="numHijos" value="3"> 3</input>
                        <input type="radio" name="numHijos" value="4"> 4</input>
                    </div>
                </div>

                <br>

                <div class="form-buttons">
                    <button type="submit" name="accion" value="calcular" class="btn btn-primary">Calcular Nómina</button>
                </div>
            </form>
        </div>
    </div>
    <div class="container1">
        <!--  Cerrar Sesión -->
        <form action="resultado.php" method="post">
            <div class="form-buttons">
                <button type="submit" name="accion" value="cerrar" class="btn btn-secondary">Cerrar Sesión</button>
                <?php
                if (isset($_POST['cerrar'])) {
                    cerrar_sesion();
                }
                ?>
            </div>
        </form>
    </div>
</body>

</html>