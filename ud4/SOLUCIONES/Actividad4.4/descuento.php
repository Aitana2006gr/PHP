<?php
    // Conexión a la base de datos
	$opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
	$conn = new PDO("mysql:host=localhost;dbname=dwes", "dwes", "abc123.", $opciones);

    // Si se pulsa el botón de comprar se ejecutará esta parte del código
    if (isset($_POST['descuento'])) {
        $sql = "UPDATE producto SET PVP = 0.9*PVP WHERE cod = '{$_POST['producto']}'";
        $conn->query($sql);
    }

    // Conseguir los datos
    $sql = "SELECT * FROM producto ORDER BY cod";
	$resultado = $conn->query($sql);

	// Cerramos la conexión a la BD
    unset($conn);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Descuento</title>
  <link rel="stylesheet" href="dwes.css">
</head>
<body>
<div id="encabezado">
	<h1>Ejercicio: Descuento</h1>
</div>

<div id="contenido">
    <h2>Listado de productos:</h2>
    <table>
        <tr>
            <th>Familia</th>
            <th>Cógigo</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th></th>
        </tr>
    <?php
        foreach($resultado as $producto) {
        ?>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <tr>
			<input type="hidden" name="producto" value="<?php echo $producto['cod'] ?>">
            <td><?php print($producto['familia']); ?></td>
            <td><?php print($producto['cod']); ?></td>
            <td><?php print($producto['nombre_corto']); ?></td>
            <td><?php print($producto['PVP']); ?></td>
            <?php if ($producto['PVP'] > 100) {
            ?>
            <td>
                <input type="submit" name="descuento" value="Descuento">
            </td>
            <?php }?>
            <tr>
        </form>
        <?php
        }
        ?>
    </table>
</div>

<div id="pie">
</div>
</body>
</html>
