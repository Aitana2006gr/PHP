<!DOCTYPE html>
<!-- Desarrollo Web en Entorno Servidor- 
 Ej: Validar datos en la misma página que el formulario-->
<html>
<!-- 1.- Copia los formularios de los ejemplos facilitados en los apuntes, tanto el que utiliza el
método POST como el que del método GET. Añádele un campo edad y observa la URL para
poder apreciar cómo se produce el envío de los parámetros.-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Desarrollo Web</title>
</head>

<body>
    <?php
    if (isset($_POST['enviar'])) { //Comprobación de envio de formulario
        if (!empty($_POST['modulos']) && !empty($_POST['nombre']) && !empty($_POST['edad'])) {
            //Se comprueba que no estén vacíos
            $nombre = $_POST['nombre'];
            $edad = $_POST['edad'];
            $modulos = $_POST['modulos'];

            print "Nombre: " . $nombre . "<br>";
            print "Edad: " . $edad . "<br>";
            foreach ($modulos as $modulo) {
                print "Modulo: " . $modulo . "<br>";
            }
        }
    } else {
    ?>
        <!--Formulario-->
        <form name="input" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            Nombre del alumno:
            <input type="text" name="nombre" value="<?php echo $_POST['nombre']; ?>" />
            <?php if (isset($_POST['enviar']) && empty($_POST['nombre']))
                echo "<span style='color:red'> &lt;-- Debe introducir un nombre!!</span>"
            ?>
            <br>
            <p>Edad:
                <input type="text" name="edad" value="<?php echo $_POST['edad']; ?>" />
                <?php if (isset($_POST['enviar']) && empty($_POST['edad']))
                    echo "<span style='color:red'> &lt;-- Debe introducir una edad!!</span>"
                ?>
                <br>
            </p>
            <p>Módulos que cursa:
                <?php if (isset($_POST['enviar']) && empty($_POST['modulos']))
                    echo "<span style='color:red'> &lt;-- Debe escoger al menos uno!!</span>"
                ?>
            </p>
            <input type="checkbox" name="modulos[]" value="DWES"
                <?php if (isset($_POST['modulos']) && in_array("DWES", $_POST['modulos']))
                    echo 'checked="checked"';
                ?> />
            Desarrollo web en entorno servidor
            <br>
            <input type="checkbox" name="modulos[]" value="DWEC"
                <?php
                if (isset($_POST['modulos']) && in_array("DWEC", $_POST['modulos']))
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