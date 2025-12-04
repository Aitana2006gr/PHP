<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Ejercicio Diccionario</title>
</head>

<body>
    <?php
    //ESTRUCTURA: FUNCIONES ARRIBA, VERLLAMADAS, FORMULARIO
    //Añadir una palabra en español y su equivalente en inglés (verificar que no existe
    //previamente esa palabra en el diccionario, sino dar un mensaje de error)
    function cargarPalabras($palabras){
        echo "<div><strong>ESPAÑOL------INGLÉS</strong><div>";
        foreach ($palabras as $palabraES => $palabraEN) {
            echo "<div>" . $palabraES . "------" . $palabraEN . "<div>";
        }
    }
    function añadir(&$palabras)
    {
        if (!empty($_POST["palabraES"]) && !empty($_POST["palabraEN"])) { //Esto es para comprobar que los datos del formulario no estan vacíos
            if (array_key_exists($_POST["palabraES"], $palabras)) {
                echo "ERROR: Esa palabra ya está registrada en el diccionario";
            } else {
                $palabras[$_POST["palabraES"]] = $_POST["palabraEN"];
            }
        } else {
            echo "No se ha podido registrar la palabra";
        }
    }


    ////Hacer un listado de los verbos acabados en “ar”.
    function listar($palabras)
    {
        echo "<h2>Listado de verbos acabados en 'ar'</h2>";
        echo "<div><strong>ESPAÑOL------INGLÉS</strong><div>";
        foreach ($palabras as $palabraES => $palabraEN) {
            echo "<div>" . $palabraES . "------" . $palabraEN . "<div>";
        }
    }

    //Teclear un verbo en español y eliminarle (verificar que existe, si no dar un mensaje de error).
    function eliminar(&$palabras)
    //Para eliminar tiene que ser usando el array_search para poder eliminar tanto en inglés como en español.
    {
        if (!empty($_POST['palabraES'])) {
            $palabra = $_POST['palabraES'];
            if (array_key_exists($palabra, $palabras)) {
                unset($palabras[$palabra]);
                echo "Palabra eliminada.";
            } else {
                echo "ERROR: La palabra no existe";
            }
        } else {
            echo "ERROR: No se ha podido eliminar la palabra";
        }
    }
    //Escribir un verbo español y buscar su significado en inglés.
    function buscar($palabras, $idioma)
    {
        switch ($idioma) {
            case 'ES':
                if (!empty($_POST['palabraES'])) {
                    $palabra = $_POST['palabraES'];
                    if (array_key_exists($palabra, $palabras)) {
                        echo $palabra . "->" . $palabras[$palabra];
                    } else {
                        echo "ERROR: La palabra $palabra no existe en el diccionario";
                    }
                } else {
                    echo "ERROR: No se ha podido encontrar la palabra";
                }
                break;
            case 'EN':
                if (!empty($_POST['palabraEN'])) {
                    $palabra = $_POST['palabraEN'];
                    $encontrada = false;
                    foreach ($palabras as $palabraES => $palabraEN) {
                        if ($palabra === $palabraEN) {
                            $encontrada = true;
                            echo $palabra . "->" . $palabraES;
                            break;
                        }
                    }
                    if ($encontrada === false) {
                        echo "ERROR: La palabra $palabra no existe en el diccionario";
                    }
                }

                break;
            default:
                echo "ERROR: Problema en la búsqueda al seleccionar el idioma";
        }
    }

    //Llamadas
    if($_SERVER['REQUEST_METHOD']=='POST'){//Verificar que el formulario se envió por POST
    }
    
    if (isset($_POST['array'])) {
        $palabras = unserialize($_POST['array']);
    } else { //primera vez que carga
        $palabras = array(
            "cantar" => "sing",
            "estudiar" => "study",
            "manzana" => "apple"
        );
    }
    if (isset($_POST['listar'])) {
        listar($palabras);
    }
    if (isset($_POST['añadir'])) {
        añadir($palabras);
    }
    if (isset($_POST['eliminar'])) { 
        eliminar($palabras);
    }
    if (isset($_POST['buscarES'])) {
        buscar($palabras, 'ES');
    }
    if (isset($_POST['buscarEN'])) {
        buscar($palabras, 'EN');
    }
    
    //cargarPalabras($palabras);
    ?>

    <!--Formulario-->
    <h2>Diccionario Español - Inglés</h2>
    <form action='<?php echo $_SERVER['PHP_SELF']; ?>' method="post">
        <input type="hidden" name="array" value='<?php echo serialize($palabras) ?>'>
        <fieldset>
            <p>Español: <input type="text" name="palabraES"></input>
                Inglés: <input type="text" name="palabraEN"></input></p>
            <input type="submit" name="añadir" value="Añadir">
            <input type="submit" name="eliminar" value="Eliminar">
            <input type="submit" name="buscarES" value="Buscar-Español">
            <input type="submit" name="buscarEN" value="Buscar-Inglés">
            <input type="submit" name="listar" value="Listar">
        </fieldset>
    </form>
</body>

</html>