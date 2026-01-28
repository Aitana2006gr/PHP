<?php
/**
 * Cliente API REST simple sin CSS
 * Utiliza Guzzle para consumir los endpoints de la API REST
 */

require 'vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

// Configuración de la URL base del API
$BASE_URL = 'http://localhost/ud7/tarea7/public';

// Variable para almacenar el resultado de las peticiones
$resultado = null;
$error = null;

// Crear cliente Guzzle
$client = new Client([
    'base_uri' => $BASE_URL,
    'timeout'  => 5.0,
    'headers' => [
        'Content-Type' => 'application/json',
        'Accept' => 'application/json'
    ]
]);

// Procesar las peticiones
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $accion = $_POST['accion'] ?? '';

    try {
        switch ($accion) {
            case 'get_producto':
                $productoId = $_POST['producto_id'] ?? '';
                if (empty($productoId)) {
                    $error = "Por favor, introduce un COD de producto";
                } else {
                    $response = $client->request('GET', $BASE_URL. "/producto/$productoId");
                    $resultado = [
                        'titulo' => "GET /producto/$productoId",
                        'status' => $response->getStatusCode(),
                        'body' => json_decode($response->getBody(), true)
                    ];
                }
                break;

            case 'get_stock':
                $productoId = $_POST['stock_id'] ?? '';
                if (empty($productoId)) {
                    $error = "Por favor, introduce un COD de producto";
                } else {
                    $response = $client->request('GET', $BASE_URL."/producto/stock/$productoId");
                    $resultado = [
                        'titulo' => "GET /producto/stock/$productoId",
                        'status' => $response->getStatusCode(),
                        'body' => json_decode($response->getBody(), true)
                    ];
                }
                break;

            case 'crear_tienda':
                $nombre = $_POST['tienda_nombre'] ?? '';
                $tlf = $_POST['tienda_tlf'] ?? '';

                if (empty($nombre) || empty($tlf)) {
                    $error = "Por favor, completa todos los campos";
                } else {
                    $response = $client->request('POST', $BASE_URL.'/tienda', [
                        'json' => [
                            'nombre' => $nombre,
                            'tlf' => $tlf
                        ]
                    ]);
                    $resultado = [
                        'titulo' => "PUT /tienda",
                        'status' => $response->getStatusCode(),
                        'body' => $response->getBody()->getContents()
                    ];
                }
                break;

            case 'eliminar_tienda':
                $cod = $_POST['tienda_cod'] ?? '';

                if (empty($cod)) {
                    $error = "Por favor, introduce el código de la tienda";
                } else {
                    $response = $client->request('DELETE', $BASE_URL.'/tienda', [
                        'json' => [
                            'cod' => $cod
                        ]
                    ]);
                    $resultado = [
                        'titulo' => "DELETE /tienda",
                        'status' => $response->getStatusCode(),
                        'body' => $response->getBody()->getContents()
                    ];
                }
                break;
        }
    } catch (RequestException $e) {
        $error = "Error en la petición: " . $e->getMessage();
        if ($e->hasResponse()) {
            $error .= " | Status: " . $e->getResponse()->getStatusCode();
            $error .= " | Response: " . $e->getResponse()->getBody();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cliente API REST - Simple</title>
</head>
<body>
    <h1>Cliente API REST - Interfaz HTML Simple</h1>

    <hr>

    <h3>Configuración</h3>
    <p>URL Base del API: <strong><?php echo htmlspecialchars($BASE_URL); ?></strong></p>
    <p><em>Si necesitas cambiar la URL, modifica la variable $BASE_URL en este archivo.</em></p>

    <hr>

    <?php if ($error): ?>
        <h3>ERROR</h3>
        <p><strong><?php echo htmlspecialchars($error); ?></strong></p>
        <hr>
    <?php endif; ?>

    <?php if ($resultado): ?>
        <h3>Resultado de la Petición</h3>
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>Endpoint</th>
                <td><?php echo htmlspecialchars($resultado['titulo']); ?></td>
            </tr>
            <tr>
                <th>Status Code</th>
                <td><?php echo $resultado['status']; ?></td>
            </tr>
            <tr>
                <th>Response Body</th>
                <td><pre><?php echo htmlspecialchars(is_array($resultado['body']) ? json_encode($resultado['body'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) : $resultado['body']); ?></pre></td>
            </tr>
        </table>
        <hr>
    <?php endif; ?>

    <h2>1. Obtener Producto</h2>
    <p><strong>Método:</strong> GET | <strong>Endpoint:</strong> /producto/{id}</p>
    <form method="POST">
        <input type="hidden" name="accion" value="get_producto">
        <table>
            <tr>
                <td><label for="producto_id">ID del Producto:</label></td>
                <td><input type="text" id="producto_id" name="producto_id" placeholder="Ej: 1" required></td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit">Consultar Producto</button>
                </td>
            </tr>
        </table>
    </form>

    <hr>

    <h2>2. Obtener Stock de Producto</h2>
    <p><strong>Método:</strong> GET | <strong>Endpoint:</strong> /producto/stock/{id}</p>
    <form method="POST">
        <input type="hidden" name="accion" value="get_stock">
        <table>
            <tr>
                <td><label for="stock_id">ID del Producto:</label></td>
                <td><input type="text" id="stock_id" name="stock_id" placeholder="Ej: 1" required></td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit">Consultar Stock</button>
                </td>
            </tr>
        </table>
    </form>

    <hr>

    <h2>3. Crear Tienda</h2>
    <p><strong>Método:</strong> PUT | <strong>Endpoint:</strong> /tienda</p>
    <form method="POST">
        <input type="hidden" name="accion" value="crear_tienda">
        <table>
            <tr>
                <td><label for="tienda_nombre">Nombre de la Tienda:</label></td>
                <td><input type="text" id="tienda_nombre" name="tienda_nombre" placeholder="Ej: Mi Tienda" required></td>
            </tr>
            <tr>
                <td><label for="tienda_tlf">Teléfono:</label></td>
                <td><input type="text" id="tienda_tlf" name="tienda_tlf" placeholder="Ej: 666777888" required></td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit">Crear Tienda</button>
                </td>
            </tr>
        </table>
    </form>

    <hr>

    <h2>4. Eliminar Tienda</h2>
    <p><strong>Método:</strong> DELETE | <strong>Endpoint:</strong> /tienda</p>
    <form method="POST">
        <input type="hidden" name="accion" value="eliminar_tienda">
        <table>
            <tr>
                <td><label for="tienda_cod">Código de la Tienda:</label></td>
                <td><input type="number" id="tienda_cod" name="tienda_cod" placeholder="Ej: 1" required></td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit">Eliminar Tienda</button>
                </td>
            </tr>
        </table>
    </form>

    <hr>

    <footer>
        <p><em>Cliente API REST  - Sin CSS</em></p>
    </footer>
</body>
</html>
