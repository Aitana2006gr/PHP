<?php
/*
Desarrolla un sistema de carrito de compras llamado tienda_sesiones.php que gestione productos usando variables de sesión. NO requiere base de datos, usa un array fijo de productos.

Requisitos:
Array de productos fijo (mínimo 6 productos):
$productos = [
    101 => ["nombre" => "Laptop", "precio" => 899.99],
    102 => ["nombre" => "Mouse", "precio" => 25.50],
    // ... etc

Funcionalidades:
Mostrar tabla con todos los productos disponibles (código, nombre, precio, botón "Añadir")
Al añadir un producto, guardarlo en $_SESSION['carrito']
Si el producto ya existe en el carrito, incrementar la cantidad
Mostrar el carrito en un div lateral con: nombre, cantidad, precio unitario, subtotal
Botones por producto en el carrito: "Eliminar 1 unidad" y "Eliminar todo"
Botón "Vaciar carrito" que elimine todos los productos
Mostrar el TOTAL general del carrito
Botón "Finalizar compra" que muestre un resumen y destruya la sesión

Estructura del carrito en sesión:
$_SESSION['carrito'] = [
    101 => ["nombre" => "Laptop", "precio" => 899.99, "cantidad" => 2],
    102 => ["nombre" => "Mouse", "precio" => 25.50, "cantidad" => 1]
];

Detalles técnicos:
Usar funciones separadas: añadirProducto(), eliminarUnidad(), eliminarProducto(), vaciarCarrito(), calcularTotal()
Formatear precios con number_format($precio, 2) . " €"
Usar formularios POST para todas las acciones
*/

// ---- VARIABLES ----
// Array fijo de productos disponibles. Clave: código del producto, valor: array con nombre y precio
$productos = [
    101 => ["nombre" => "Laptop", "precio" => 899.99],
    102 => ["nombre" => "Mouse", "precio" => 25.50],
    103 => ["nombre" => "Teclado", "precio" => 45.00],
    104 => ["nombre" => "Monitor", "precio" => 199.99],
    105 => ["nombre" => "Impresora", "precio" => 150.75],
    106 => ["nombre" => "Altavoces", "precio" => 75.20]
];

// Variable para mostrar mensaje al usuario de confirmacion
$mensajeConfirmacion = "";

// ---- FUNCIONES ----
// Funcion para mostrar una tabla con los productos disponibles para añadir al carrito
function generarTablaProductos($productos) {
    echo "<h2>Productos Disponibles</h2>";
    // Tabla de productos
    echo "<table border='1'>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Precio (€)</th>
                <th>Acción</th>
            </tr>";
    // Recorremos el array de productos para generar las filas
    foreach ($productos as $codigo => $info) {
        echo "<tr>
                <td>" . htmlspecialchars($codigo) . "</td>
                <td>" . htmlspecialchars($info['nombre']) . "</td>
                <td>" . number_format($info['precio'], 2) . " €</td>
                <td>
                    <form method='POST' style='margin:0;'>
                        <input type='hidden' name='codigo_producto' value='" . htmlspecialchars($codigo) . "'>
                        <input type='submit' name='accion' value='Añadir'>
                    </form>
                </td>
              </tr>";
    }
    echo "</table>";
}

// Funcion al añadir un producto al carrito
function anadirProducto($codigo) {
    // Global se usa para acceder a variables fuera del ámbito de la función
    global $mensajeConfirmacion;
    // Verificamos si el producto ya está en el carrito
    if (isset($_SESSION['carrito'][$codigo])) {
        // Incrementamos la cantidad
        $_SESSION['carrito'][$codigo]['cantidad'] += 1;
        // Mensaje de confirmacion
        $mensajeConfirmacion = "Se ha añadido otra unidad de " . $_SESSION['carrito'][$codigo]['nombre'] . " al carrito.";
    } else {
        // Añadimos el producto con cantidad 1
        global $productos; // Accedemos al array global de productos
        $_SESSION['carrito'][$codigo] = [
            'nombre' => $productos[$codigo]['nombre'],
            'precio' => $productos[$codigo]['precio'],
            'cantidad' => 1
        ];
        // Mensaje de confirmacion
        $mensajeConfirmacion = "Se ha añadido " . $productos[$codigo]['nombre'] . " al carrito.";
    }
}

// Funcion para mostrar el carrito lateral
function mostrarCarrito() {
    // Verificamos si el carrito está vacío
    if (empty($_SESSION['carrito'])) {
        echo "<h2>Carrito de Compras</h2>";
        echo "<p>El carrito está vacío. Añade algo de la lista de productos.</p>";
        return;
    }

    echo "<h2>Carrito de Compras</h2>";
    // Inicio de la tabla del carrito
    echo "<table border='1'>
            <tr>
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>Precio Unitario (€)</th>
                <th>Subtotal (€)</th>
                <th>Acciones</th>
            </tr>";
    foreach ($_SESSION['carrito'] as $codigo => $info) {
        // Calcular subtotal
        $subtotal = $info['precio'] * $info['cantidad'];
        // Mostrar fila del producto en el carrito
        echo "<tr>
                <td>" . htmlspecialchars($info['nombre']) . "</td>
                <td>" . htmlspecialchars($info['cantidad']) . "</td>
                <td>" . number_format($info['precio'], 2) . " €</td>
                <td>" . number_format($subtotal, 2) . " €</td>
                <td>
                    <form method='POST' style='display:inline;'>
                        <input type='hidden' name='codigo_producto' value='" . htmlspecialchars($codigo) . "'>
                        <input type='submit' name='accion' value='Eliminar 1 unidad'>
                    </form>
                    <form method='POST' style='display:inline;'>
                        <input type='hidden' name='codigo_producto' value='" . htmlspecialchars($codigo) . "'>
                        <input type='submit' name='accion' value='Eliminar todo'>
                    </form>
                </td>
              </tr>";
    }
    echo "</table>";
}

// Funcion para eliminar una unidad de un producto del carrito
function eliminarUnidad($codigo) {
    global $mensajeConfirmacion;

    // Verificamos si el producto está en el carrito
    if (isset($_SESSION['carrito'][$codigo])) {
        // Decrementamos la cantidad
        $_SESSION['carrito'][$codigo]['cantidad'] -= 1;

        // Si la cantidad llega a 0, eliminamos el producto del carrito
        if ($_SESSION['carrito'][$codigo]['cantidad'] <= 0) {
            // unset para eliminar el producto del carrito
            unset($_SESSION['carrito'][$codigo]);
        }

        // Mensaje de confirmacion
        $mensajeConfirmacion = "Se ha eliminado una unidad de " . htmlspecialchars($codigo) . " del carrito.";
    }
}

// Funcion para eliminar todo un producto del carrito
function eliminarProducto($codigo) {
    global $mensajeConfirmacion;

    // Verificamos si el producto está en el carrito
    if (isset($_SESSION['carrito'][$codigo])) {
        // Eliminamos el producto del carrito
        unset($_SESSION['carrito'][$codigo]);

        // Mensaje de confirmacion
        $mensajeConfirmacion = "Se han eliminado todos los productos " . htmlspecialchars($codigo) . " del carrito.";
    }
}

// Funcion para vaciar todos los productos del carrito
function vaciarCarrito() {
    global $mensajeConfirmacion;

    // Verificamos si el carrito no está vacío
    if (empty($_SESSION['carrito'])) {
        // Mensaje de confirmacion
        $mensajeConfirmacion = "El carrito ya está vacío.";
        
        // terminamos la función
        return;
    }
    // Vaciamos el carrito usando unset
    unset($_SESSION['carrito']);
    // Alterantivamente, podríamos usar:
    // $_SESSION['carrito'] = [];

    // Mensaje de confirmacion
    $mensajeConfirmacion = "Se ha vaciado el carrito de compras.";
}

// Funcion para calcular el total del carrito
function calcularTotalCarrito () {
    // Variable para acumular el total
    $total = 0;

    // Verificamos si el carrito está vacío
    if (empty($_SESSION['carrito'])) {
        echo "<h3>Total del Carrito: 0.00 €</h3>";
        return;
    }

    //Recorremos el carrito sumando subtotales
    // Recordar que al recorrer solo con as sin =>, obtendremos solo los valores
    foreach ($_SESSION['carrito'] as $producto) {
        // Cantidad se incorpora al array del carrito en la variable de sesión
        $total += $producto['precio'] * $producto['cantidad'];
    }

    // Mostramos el total formateado
    echo "<h3>Total del Carrito: " . number_format($total, 2) . " €</h3>";
}

// Funcion para finalizar la compra
function finalizarCompra() {
    global $mensajeConfirmacion;

    // Verificamos si el carrito está vacío
    if (empty($_SESSION['carrito'])) {
        $mensajeConfirmacion = "El carrito está vacío. No se puede finalizar la compra.";
        return;
    }

    // Mostramos el resumen de la compra
    $mensajeConfirmacion = "<h2>Resumen de la Compra</h2>";
    $mensajeConfirmacion .= "<ul style='list-style-type: none;'>";
    foreach ($_SESSION['carrito'] as $info) {
        $subtotal = $info['precio'] * $info['cantidad'];
        $mensajeConfirmacion .= "<li>" . htmlspecialchars($info['nombre']) . " - Cantidad: " . htmlspecialchars($info['cantidad']) . " - Precio Unitario: " . number_format($info['precio'], 2) . " € - Subtotal: " . number_format($subtotal, 2) . " €</li>";
    }
    $mensajeConfirmacion .= "</ul>";
    // Calculamos el total final
    $totalFinal = 0;
    foreach ($_SESSION['carrito'] as $producto) {
        $totalFinal += $producto['precio'] * $producto['cantidad'];
    }
    $mensajeConfirmacion .= "<h3>Total Final: " . number_format($totalFinal, 2) . " €</h3>";
    $mensajeConfirmacion .= "<p>Gracias por su compra.</p>";

    // Destruimos la sesión para vaciar el carrito
    session_destroy();

}

// ---- LÓGICA PRINCIPAL ----
// Iniciar sesión
session_start();

// Si no existe el carrito en sesión, lo inicializamos como array vacío
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

// Comprobar si se ha enviado alguna acción desde los formularios
// Para usar switch, cualquier formulario debe enviar un campo (name) 'accion' con el valor (value) correspondiente
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['accion'])) {
    // Obtener la acción
    $accion = $_POST['accion'];
    // Asignamos el código del producto si existe con operador ternario
    $codigoProducto = isset($_POST['codigo_producto']) ? $_POST['codigo_producto'] : null;

    switch ($accion) {
        case 'Añadir':
            anadirProducto($codigoProducto);
            break;
        case 'Eliminar 1 unidad':
            eliminarUnidad($codigoProducto);
            break;
        case 'Eliminar todo':
            eliminarProducto($codigoProducto);
            break;
        case 'Vaciar carrito':
            vaciarCarrito();
            break;
        case 'Finalizar compra':
            finalizarCompra();
            break;
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 02 - Carrito de compras</title>
</head>
<body>
    <h1 style="text-align: center;"> Carrito de Compras con Sesiones</h1>
    <!--- Div con tabla a la izquierda y carrito a la derecha, centrado --->
    <div style="display: flex; justify-content: center; gap: 20px;">
        <div>
            <?php
                // Mostrar tabla de productos disponibles
                generarTablaProductos($productos);
            ?>
        </div>
        <div>
            <?php
                // Mostrar el carrito lateral
                mostrarCarrito();
                // Mostrar el total del carrito
                calcularTotalCarrito();
            ?>

            <form method="POST">
                <input type="submit" name="accion" value="Vaciar carrito">
                <input type="submit" name="accion" value="Finalizar compra">
            </form>

        </div>
    </div>
    
    <!-- Div para mostrar mensajes de confirmacion al usuario -->
    <div style ="margin-top: 20px; text-align: center;">
        <?php
            // Mostrar mensaje de confirmacion si existe
            if (!empty($mensajeConfirmacion)) {
                // NO usar htmlspecialchars() aquí porque $mensajeConfirmacion 
                // ya contiene HTML formateado (desde finalizarCompra)
                // Los datos individuales ya están protegidos dentro de cada función
                echo $mensajeConfirmacion;
            }
        ?>
    </div>

</body>
</html>