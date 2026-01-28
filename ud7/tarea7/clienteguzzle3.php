<?php 
require 'vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

//$BASE__URL = "http://localhost/GitHub/PHP/PHP/ud7/tarea7/public/";
$BASE__URL = "http://localhost/PHP/ud7/tarea7/public/";
// Objeto cliente de la clase Guzzle
$client = new Client([
    'base_uri' => $BASE__URL,
    'timeout' => 5.0,
    'headers' => [
        'Content-Type' => 'application/json',
        'Accept' => 'application/json',
    ]
]);

function printResponse($title, $response)
{
    echo "<h3>$title</h3>";
    echo "Status Code: " . $response->getStatusCode() . "<br>";
    echo "Body: " . $response->getBody() . "<br><hr>";
}

function printError($title, $error)
{
    echo "<h3>$title - ERROR</h3>";
    echo "Error: " . $error->getMessage() . "<br>";
    if ($error instanceof RequestException && $error->hasResponse()) {
        echo "Status Code: " . $error->getResponse()->getStatusCode() . "<br>";
        echo "Response Body: " . $error->getResponse()->getBody() . "<br>";
    }
    echo "<hr>";
}

echo "<h1> CLIENTE API REST - PRUEBA ENDPOINTS </h1>";

pruebaGetProducto($BASE__URL, $client);
pruebaGetStock($BASE__URL, $client);
pruebaCrearTienda($BASE__URL, $client);
pruebaEliminarTienda($BASE__URL, $client);

//PRUEBAS

function pruebaGetProducto($BASE__URL, $client)
{
    try {
        $productoId = "3DSNG";
        $response = $client->request('GET', 'producto/' . $productoId);
        printResponse("1. GET /producto/$productoId", $response);
    } catch (RequestException $e) {
        printError("1. GET - ERROR /producto/$productoId", $e);
    }
}

function pruebaGetStock($BASE__URL, $client)
{
    try {
        $productoId = "3DSNG";
        $response = $client->request('GET', 'producto/stock/' . $productoId);
        printResponse("2. GET /producto/stock/$productoId", $response);
    } catch (RequestException $e) {
        printError("2. GET - ERROR /producto/stock/$productoId", $e);
    }
}

function pruebaCrearTienda($BASE__URL, $client)
{
    try {
        $nuevaTienda = [
            'nombre' => 'Tienda Guzzle',
            'tlf' => '942616638'
        ];

        $response = $client->request('POST', 'tiendas', [
            'json' => $nuevaTienda
        ]);

        printResponse("3. POST /tiendas - Crear tienda", $response);
    } catch (RequestException $e) {
        printError("3. POST - ERROR /tiendas", $e);
    }
}

function pruebaEliminarTienda($BASE__URL, $client)
{
    try {
        $tiendaId = 4; // usa un ID que exista
        $response = $client->request('DELETE', 'tiendas/' . $tiendaId);
        printResponse("4. DELETE /tiendas/$tiendaId - Eliminar tienda", $response);
    } catch (RequestException $e) {
        printError("4. DELETE - ERROR /tiendas/$tiendaId", $e);
    }
}
