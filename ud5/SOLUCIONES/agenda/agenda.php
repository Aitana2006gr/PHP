<?php
// Iniciamos o reanudamos la sesión
session_start();

// Creamos el array de la agenda si no está en la sesión todavía
if(!isset($_SESSION['agenda'])) {
    $_SESSION['agenda'] = array(
        "Marta" => 675223344,
        "Alberto" => 654321123,
        "Luis" => 642335334,
        "Kiko" => 632123261,
        "Sandra" => 665667788,
        "Rocío" => 689326598,
    );
}

// Array que contendrá las busquedas
if(!isset($_SESSION['listado'])) {
    $_SESSION['listado'] = [];
}

// Variable que mostrará el listado
$mostrar_listado = false;

// Si se ha pulsado al botón de buscar se añade la búsqueda en un array
if(isset($_POST['buscar'])) {
        // Si existe la clave en el array significa que está la persona, y obtenemos su número
        $titular = $_POST['titular'];
		if(array_key_exists($titular, $_SESSION['agenda'])) {
            $numero = $_SESSION['agenda'][$titular]; 
        } else {
            // Si no encuentra la clave, no está en el array, asignamos el valor "DESCONOCIDO"
            $numero = "DESCONOCIDO";
        }
    $_SESSION['listado'][$titular] = $numero;
}

// Si se ha pulsado al botón de listar se habilita la variable que muestra las búsquedas realizadas
if(isset($_POST['listado'])) {
	$mostrar_listado = true;
}

// Si se ha pulsado el botón de cerrar sesión se ejecuta esta parte de código
if(isset($_POST['cerrar'])) {
    // Destruye la sesión
    session_destroy();
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Agenda</title>
  <link rel="stylesheet" href="dwes.css">
</head>

<body class="ejer2">

<div id="encabezado">
	<h1>Ejercicio: Agenda</h1>
</div>

<div id="contenido">
    <h2>Localizados</h2>

    <form action="agenda.php" method="POST">
        <label for="titual">Titular</label>
        <input type="text" name="titular" id="titular"><br><br>
        <input type="submit" name="buscar" value="Buscar titular">
        <input type="submit" name="listado" value="Listado">
        <input type="submit" name="cerrar" value="CERRAR"><br><br>
    </form>
    <?php
	if (isset($titular)) echo "<p>".$titular.": ".$numero."</p>";
	if ($mostrar_listado) {
        print("<table border='1'>
            <tr>    
                <th>Titular</th>
                <th>Número</th>
            </tr>
        ");
        foreach($_SESSION['listado'] as $persona => $numero) {
            print("<tr>
                <td>$persona</td>
                <td>$numero</td>
            </tr>");
        }
        print("</table>");
     }
    ?>
</div>

<div id="pie">
</div>
</body>
</html>
