<html>

<head id="cabezera">
    <?php
    session_start(); //me recoge todas las variables de esa sesión   
    if (!isset($_COOKIE['numero'])) {
        //Genero el numero
        $numero = rand(1, 100);
        setcookie("numero", $numero, time() + 3600);
        //$_COOKIE['numero'] = $numero;
        //$_COOKIE['intentos'] = 1;
        setcookie("intentos", 1, time() + 3600);
        header('jugarCookies.php');
        exit();
    }
    /*
    if(!isset($_COOKIE['intentos'])) {
        $numIntentos=0;
        $_COOKIE['intentos'][] = 0;
        setcookie("intentos",$numIntentos, time() + 3600); 
        $_COOKIE['intentos'] =1;
    } RESOLVER*/
    $numIntentos = 1;
    if (isset($_POST['enviar'])) {
        if (empty($_POST['numeroIntento'])) {
            echo "<p>ERROR: No hay un numero</p>";
        } else {

            $numIntentos++;
            setcookie("intentos", $numIntentos, time() + 3600);
            $numeroIntento = $_POST['numeroIntento'];
            echo "----Recibi un numero----";
            if ($numeroIntento == $_COOKIE['numero']) {
                echo "<p>Se ha acertado el numero</p>";
                echo "<p>Numero de intentos: ", $_COOKIE['intentos'], "<p></p>";
            } else {
                echo "<p>Fallaste. Intentalo de nuevo</p>";
                //En caso de fallo, el servidor le dará pistas para teclear un número mayor o menor según el caso.
                if ($numeroIntento > $_COOKIE['numero']) {
                    $pista = "El número es menor";
                }
                if ($numeroIntento < $_COOKIE['numero']) {
                    $pista = "El número es mayor";
                }
                echo $pista;
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
        print_r($_COOKIE['numero']);
        echo "<br>Intentos: ";
        print_r($_COOKIE['intentos']);

        ?>
    </form>
    <?php

    ?>


</body>
<footer id="pie">

</footer>

</html>