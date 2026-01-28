<?php
require 'vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

$BASE__URL = "http://localhost/PHP/ud7/tarea7/public/";

$client = new Client([
    'base_uri' => $BASE__URL,
    'timeout' => 5.0,
    'headers' => [
        'Content-Type' => 'application/json',
        'Accept' => 'application/json',
    ]
]);

$resultadoHTML = "";

//Funciones de salida
function printResponseHTML($title, $response, $fullUrl)
{
    return "<h3>$title</h3>
            <strong>URL:</strong> $fullUrl <br>
            <strong>Status Code:</strong> " . $response->getStatusCode() . "<br>
            <strong>Body:</strong><pre>" . $response->getBody() . "</pre><hr>";
}

function printErrorHTML($title, $error, $fullUrl)
{
    $html = "<h3>$title - ERROR</h3>
             <strong>URL:</strong> $fullUrl <br>
             <strong>Mensaje:</strong> " . $error->getMessage() . "<br>";

    if ($error instanceof RequestException && $error->hasResponse()) {
        $html .= "<strong>Status Code:</strong> " . $error->getResponse()->getStatusCode() . "<br>";
        $html .= "<strong>Response Body:</strong><pre>" . $error->getResponse()->getBody() . "</pre>";
    }

    return $html . "<hr>";
}

function pruebaGetProducto($BASE__URL, $client, $productoId)
{
    try {
        $endpoint = "producto/$productoId"; // SIN BARRA INICIAL
        $response = $client->request('GET', $endpoint);
        $fullUrl = "$BASE__URL"."$endpoint";
        return printResponseHTML("GET /producto/$productoId", $response, $fullUrl);
    } catch (RequestException $e) {
        return printErrorHTML("GET /producto/$productoId", $e, "$BASE__URL/producto/$productoId");
    }
}

function pruebaGetStock($BASE__URL, $client, $productoId)
{
    try {
        $endpoint = "producto/stock/$productoId";
        $response = $client->request('GET', $endpoint);
        $fullUrl = "$BASE__URL"."$endpoint";
        return printResponseHTML("GET /producto/stock/$productoId", $response, $fullUrl);
    } catch (RequestException $e) {
        return printErrorHTML("GET /producto/stock/$productoId", $e, "$BASE__URL/producto/stock/$productoId");
    }
}

function pruebaCrearTienda($BASE__URL, $client, $nombre, $tlf)
{
    try {
        $endpoint = "tiendas";
        $response = $client->request('POST', $endpoint, [
            'json' => [
                'nombre' => $nombre,
                'tlf' => $tlf
            ]
        ]);
        $fullUrl = "$BASE__URL"."$endpoint";
        return printResponseHTML("POST /tiendas", $response, $fullUrl);
    } catch (RequestException $e) {
        return printErrorHTML("POST /tiendas", $e, "$BASE__URL/tiendas");
    }
}

function pruebaEliminarTienda($BASE__URL, $client, $tiendaId)
{
    try {
        $endpoint = "tiendas/$tiendaId";
        $response = $client->request('DELETE', $endpoint);
        $fullUrl = "$BASE__URL"."$endpoint";
        return printResponseHTML("DELETE /tiendas/$tiendaId", $response, $fullUrl);
    } catch (RequestException $e) {
        return printErrorHTML("DELETE /tiendas/$tiendaId", $e, "$BASE__URL/tiendas/$tiendaId");
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["accion"])) {

    switch ($_POST["accion"]) {

        case "get_producto":
            $resultadoHTML = pruebaGetProducto($BASE__URL, $client, $_POST["producto_id"]);
            break;

        case "get_stock":
            $resultadoHTML = pruebaGetStock($BASE__URL, $client, $_POST["stock_producto_id"]);
            break;

        case "crear_tienda":
            $resultadoHTML = pruebaCrearTienda(
                $BASE__URL,
                $client,
                $_POST["tienda_nombre"],
                $_POST["tienda_tlf"]
            );
            break;

        case "eliminar_tienda":
            $resultadoHTML = pruebaEliminarTienda($BASE__URL, $client, $_POST["tienda_id"]);
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cliente Guzzle con Formularios</title>
</head>
<body>

<h1>Cliente con Formularios</h1>

<?php if (!empty($resultadoHTML)): ?>
    <div>
        <?= $resultadoHTML ?>
    </div>
<?php endif; ?>


<hr>

<h2>1. Obtener Producto</h2>
<form method="POST">
    <input type="hidden" name="accion" value="get_producto">
    ID Producto: <input type="text" name="producto_id" required>
    <button type="submit">Consultar</button>
</form>

<hr>

<h2>2. Obtener Stock de un Producto</h2>
<form method="POST">
    <input type="hidden" name="accion" value="get_stock">
    Código Producto: <input type="text" name="stock_producto_id" required>
    <button type="submit">Consultar Stock</button>
</form>

<hr>

<h2>3. Crear Tienda</h2>
<form method="POST">
    <input type="hidden" name="accion" value="crear_tienda">
    Nombre: <input type="text" name="tienda_nombre" required>
    Teléfono: <input type="text" name="tienda_tlf">
    <button type="submit">Crear</button>
</form>

<hr>

<h2>4.Eliminar Tienda</h2>
<form method="POST">
    <input type="hidden" name="accion" value="eliminar_tienda">
    ID Tienda: <input type="number" name="tienda_id" required>
    <button type="submit">Eliminar</button>
</form>

</body>
</html>
