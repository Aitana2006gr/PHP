<?php
session_start();
include_once 'funciones.php';
//Clase que permite registrar los pedidos de productos de una tienda online
echo "<h2> Registro de Pedidos - Tienda online </h2>";
$categorias=getCategorias();

//Compruebo el numero de Pedido
if (!isset($_SESSION['numeroPedido'])) {
    $_SESSION['numeroPedido'] =0;
    $_SESSION['nombre'] ='';
    $_SESSION['cantidad'] =0;
    $_SESSION['precio'] = '';
    $_SESSION['totalAcumulado'] = 0;
    $_SESSION['descuentoaplicado'] = 0;
    $_SESSION['totalPedido'] = 0;
} else {
    if (!isset($_POST['calcular'])) {
        $_SESSION['numeroPedido'] ++;
    }
}

//Si se pulsa el botón volverIniciar limpiamos los campos del formulario
if (isset($_POST['volverIniciar'])) {
	$_SESSION['lista']=$_SESSION['numeroPedido'];
	//  limpiamos sesión para el nuevo
	unset ($_SESSION['nombre']);
	unset ($_SESSION['categoria'] );
	unset ($_SESSION['precio']);
	unset ($_SESSION['cantidad']) ;
	unset ($_SESSION['descuentoaplicado']);
    unset ($_SESSION['totalPedido']);
    unset ($_SESSION['totalAcumulado']);
}

//Si se pulsa el botón calcular
if (isset($_POST['calcular'])) {
        $_SESSION['numeroPedido'] = $_POST['nombre'];
        $_SESSION['nombre'] = $_POST['nombre'];
        $_SESSION['precio'] = $_POST['precio'];
        $_SESSION['categoria'] = $_POST['categoria'];
        $_SESSION['cantidad'] = $_POST['cantidad'];

        //Si no existe la lista de productos, se inicializa
        if (!isset($_SESSION["lista"])) {
            $_SESSION["lista"] = array();
        }
}

//Variables que se muestran en el formulario
$nombre = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : "";
$categoria= isset($_SESSION['categoria']) ? $_SESSION['categoria'] : "";
$precio= isset($_SESSION['precio']) ? $_SESSION['precio'] : "";
$cantidad= isset($_SESSION['cantidad']) ? $_SESSION['cantidad'] : "";
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Pedidos</title>
</head>

<body>
    <div>
        <h1>Pedido Nº: <?php echo $_SESSION['numeroPedido'] ?></h1>
        <form action="resultadoPedido.php" autocomplete="on" method="post">
            <p>Nombre del producto: <input type="text" name="nombre" value="<?php echo $nombre ?>" required></p>
            <p>Precio unitario en euros: <input type="text" name="precio" value="<?php echo $precio ?>" required> </p>
            <p>Cantidad: <input type="number" name="cantidad" value="<?php echo $cantidad ?>" min="1" max="100"></p>
            <p> <label for="categoria">Categoria</label>
                <select id="categoria" name="categoria">
                    <?php
                    echo "<option value='' selected disabled hidden>Selecciona...</option>";
                    foreach ($categorias as $clave => $valor) {
                        echo '<option value="' . $clave . '" name="categoria">' . $valor . '</input>';
                    }
                    ?>
                </select><br><br>
            </p>
            <input type="submit" value="Calcular" name="calcular">
        </form>
        <form action="listadoPedido.php" method="POST">
            <input type="submit" value="Cerrar" name="cerrar" />
        </form>
        <br/>
    </div>
</body>

</html>