<!DOCTYPE html>
<html>
<!-- Desarrollo Web en Entorno Servidor- 
 Ej: Validar datos en la misma página que el formulario-->
<!-- 1.- Copia los formularios de los ejemplos facilitados en los apuntes, tanto el que utiliza el
método POST como el que del método GET. Añádele un campo edad y observa la URL para
poder apreciar cómo se produce el envío de los parámetros.-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Desarrollo Web</title>
</head>

<body>
    <?php
    if (isset($_GET['enviar'])) { //Comprobación de envio de formulario
        if (!empty($_GET['modulos']) && !empty($_GET['nombre']) && !empty($_GET['edad'])) {
            //Se comprueba que no estén vacíos
            $nombre = $_GET['nombre'];
            $edad = $_GET['edad'];
            $modulos = $_GET['modulos'];

            print "Nombre: " . $nombre . "<br>";
            print "Edad: " . $edad . "<br>";
            foreach ($modulos as $modulo) {
                print "Modulo: " . $modulo . "<br>";
            }
        }
    } else {
    ?>
        <!--Formulario-->
        <form name="input" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
            Nombre del alumno:
            <input type="text" name="nombre" value="<?php echo $_GET['nombre']; ?>" />
            <?php if (isset($_GET['enviar']) && empty($_GET['nombre']))
                echo "<span style='color:red'> &lt;-- Debe introducir un nombre!!</span>"
            ?>
            <br>
            <p>Edad:
                <input type="text" name="edad" value="<?php echo $_GET['edad']; ?>" />
                <?php if (isset($_GET['enviar']) && empty($_GET['edad']))
                    echo "<span style='color:red'> &lt;-- Debe introducir una edad!!</span>"
                ?>
                <br>
            </p>
            <p>Módulos que cursa:
                <?php if (isset($_GET['enviar']) && empty($_GET['modulos']))
                    echo "<span style='color:red'> &lt;-- Debe escoger al menos uno!!</span>"
                ?>
            </p>
            <input type="checkbox" name="modulos[]" value="DWES"
                <?php if (isset($_GET['modulos']) && in_array("DWES", $_GET['modulos']))
                    echo 'checked="checked"';
                ?> />
            Desarrollo web en entorno servidor
            <br>
            <input type="checkbox" name="modulos[]" value="DWEC"
                <?php
                if (isset($_GET['modulos']) && in_array("DWEC", $_GET['modulos']))
                    echo 'checked="checked"';
                ?> />
            Desarrollo web en entorno cliente<br />
            <br>
            <input type="submit" value="Enviar" name="enviar" />
        </form>
    <?php
    }
    ?>
</body>

</html>