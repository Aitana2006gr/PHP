<?php
session_start();
$productos=array("placa base"=>10,
                "disco duro"=>15,
                "monitor"=>20,
				"teclado"=>5
    );
if(!isset($_SESSION['proComprados'])){
    $_SESSION['proComprados']=array();
}
else{
    if(isset($_GET['pro'])&& isset($_GET['pre'])){
		$_SESSION['proComprados'][$_GET['pro']]=$_GET['pre'];
	}
    if(isset($_GET['proelim'])){
		unset($_SESSION['proComprados'][$_GET['proelim']]);
    }
		    
}
echo "<h1>Los productos que va adquiriendo son:</h1>";
$total=0;
foreach($_SESSION['proComprados'] as $producto => $precio) {
	echo "<li>".$producto.": ".$precio."€ ";
    echo "\n<a href='listaCompra.php?proelim=$producto'>Eliminar</a></li>";
    $total=$total+$precio;
	}
echo"<br><br>";
echo "<b>El total de la compra asciende a: ". $total."€</b>";

echo "<h1>Los Productos que tenemos en venta son:</h1>";
foreach($productos as $producto => $precio)	{
	echo "<li>".$producto.": ".$precio."€ ";
	if(!array_key_exists($producto,$_SESSION['proComprados'])){
		echo "<a href='listaCompra.php?pro=$producto&pre=$precio'>Seleccionar</a></li>";
	}
}
?>
