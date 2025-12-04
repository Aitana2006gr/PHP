<html>

<head>
    <title>Agenda</title>
</head>





<body>
    <h2>Ejercicio:Agenda</h2>
    <?php
    //Comienzo la sesión
    session_start();
    //session_destroy();
    if (!isset($_SESSION['agenda'])) { //Si no está la sesión activa, introducimos el array
        $_SESSION['agenda'] =
            $agendaFija = [ //Array asociativo de agenda
                "Marta" => 223344,
                "Alberto" => 321123,
                "Luis" => 556677,
                "Sandra" => 667788
            ];
    }
    function buscarTitular()
    {
        $_SESSION['nombre'] = $_POST['nombre'];
        //echo $_SESSION['nombre'] . "<br>";

        foreach ($_SESSION['agenda'] as $_SESSION['nombre'] => $telefono) {
            if ($_POST['nombre'] == $_SESSION['nombre']) {
                echo "Titular: " . $_SESSION['nombre'] . "<br>";
                echo "Telefono: " . $telefono;
            } else {
                echo "DESCONOCIDO";
            }
        }
    }
    function listar()
    {
        $_SESSION['listar'] = []; //Creo un array con la sesión llamado listar
        //foreach(){

        //}
    }



    if (isset($_POST["buscarTitular"])) {
        if (empty($_POST['nombre'])) {
            echo "Esta vacío el campo titular";
        } else {
            buscarTitular();
        }
    }

    if (isset($_POST["listar"])) {
    }

    if (isset($_POST["cerrar"])) {
    }


    ?>
    <h4>Localizados</h4>
    <form id="form_seleccion" method="post" action="<?php $_SERVER["PHP_SELF"] ?>">
        <label for="nombre">Titular</label>
        <input type="text" name="nombre">
        <input type="submit" name="buscarTitular" value="Buscar Titular">
        <input type="submit" name="listar" value="Listado">
        <input type="submit" name="cerrar" value="Cerrar">
    </form>
</body>

</html>