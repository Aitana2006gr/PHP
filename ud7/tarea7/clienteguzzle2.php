<?php
require 'vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

/*
|--------------------------------------------------------------------------
| CONFIGURACIÓN
|--------------------------------------------------------------------------
*/
$BASE_URL = 'http://localhost/GitHub/PHP/PHP/ud7/tarea7/public/';

$client = new Client([
    'base_uri' => $BASE_URL,
    'timeout' => 5.0,
    'headers' => [
        'Accept' => 'application/json'
    ]
]);

/*
|--------------------------------------------------------------------------
| FUNCIONES AUXILIARES
|--------------------------------------------------------------------------
*/
function printResponse(string $title, $response): void
{
    echo "<h3>$title</h3>";
    echo "Status Code: " . $response->getStatusCode() . "<br>";
    echo "Body:<br><pre>" . $response->getBody() . "</pre><hr>";
}

function printError(string $title, RequestException $error): void
{
    echo "<h3>$title - ERROR</h3>";
    echo "Mensaje: " . $error->getMessage() . "<br>";

    if ($error->hasResponse()) {
        echo "Status Code: " . $error->getResponse()->getStatusCode() . "<br>";
        echo "Response Body:<br><pre>" . $error->getResponse()->getBody() . "</pre>";
    }

    echo "<hr>";
}

/*
|--------------------------------------------------------------------------
| EJECUCIÓN DE PRUEBAS
|--------------------------------------------------------------------------
*/
echo "<h1>CLIENTE API REST – PRUEBA ENDPOINTS (GUZZLE)</h1>";

pruebaGetProducto($client);
pruebaGetStock($client);
pruebaCrearTienda($client);
pruebaEliminarTienda($client);

/*
|--------------------------------------------------------------------------
| PRUEBAS
|--------------------------------------------------------------------------
*/

function pruebaGetProducto(Client $client): void
{
    try {
        $productoId = '3DSNG';
        $response = $client->request('GET', 'producto/' . $productoId);
        printResponse("1. GET /producto/$productoId", $response);
    } catch (RequestException $e) {
        printError("1. GET /producto/$productoId", $e);
    }
}

function pruebaGetStock(Client $client): void
{
    try {
        $productoId = '3DSNG';
        $response = $client->request('GET', 'producto/stock/' . $productoId);
        printResponse("2. GET /producto/stock/$productoId", $response);
    } catch (RequestException $e) {
        printError("2. GET /producto/stock/$productoId", $e);
    }
}

function pruebaCrearTienda(Client $client): void
{
    try {
        $nuevaTienda = [
            'nombre' => 'Tienda Guzzle',
            'tlf'    => '942616638'
        ];

        $response = $client->request('POST', 'tiendas', [
            'json' => $nuevaTienda
        ]);

        printResponse("3. POST /tiendas (Crear tienda)", $response);
    } catch (RequestException $e) {
        printError("3. POST /tiendas", $e);
    }
}

function pruebaEliminarTienda(Client $client): void
{
    try {
        $tiendaId = 4; //poner un ID que exista
        $response = $client->request('DELETE', 'tiendas/' . $tiendaId);
        printResponse("4. DELETE /tiendas/$tiendaId", $response);
    } catch (RequestException $e) {
        printError("4. DELETE /tiendas/$tiendaId", $e);
    }
}
