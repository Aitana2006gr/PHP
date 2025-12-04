<html>

<head id="cabezera">
    <?php
    session_start();
    if (!isset($_SESSION['numero'])) {
        //Genero el numero
        $_SESSION['numero'] = rand(1, 100);
        $_SESSION['intentos'] = 0;
    } else {
        if (isset($_POST['enviar'])) {
            if (empty($_POST['numeroIntento'])) {
                echo "<p>ERROR: No hay un numero</p>";
            } else {
                $_SESSION['intentos']++;
                $numeroIntento = $_POST['numeroIntento'];
                echo "----Recibi un numero----";
                if ($numeroIntento == $_SESSION['numero']) {
                    echo "<p>Se ha acertado el numero</p>";
                    echo "<p>Numero de intentos: ",$_SESSION['intentos'],"<p></p>";
                } else {
                    echo "<p>Fallaste. Intentalo de nuevo</p>";
                    //En caso de fallo, el servidor le dará pistas para teclear un número mayor o menor según el caso.
                    if($numeroIntento>$_SESSION['numero']){
                        $pista="El número es menor";
                    }
                    if($numeroIntento<$_SESSION['numero']){
                        $pista="El número es mayor";
                    }
                    echo $pista;
                }
            }
        }
    }
    ?>
</head>

<body id="contenido">
    <h1>ADIVINA EL NÚMERO</h1>

    <form id="form_seleccion" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label>Introduce un número del 1 al 100:</label>
        <input type="number" name="numeroIntento" required>
        <input type="submit" name="enviar" value="enviar">
        <?php
        echo "<br>Numero: ";
        print_r($_SESSION['numero']);
        echo "<br>Intentos: ";
        //print_r($_SESSION['intentos']);

        ?>
    </form>
    <?php

    ?>


</body>
<footer id="pie">

</footer>

</html>