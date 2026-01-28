<?php
require 'vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

$BASE__URL = "http://localhost/GitHub/PHP/PHP/ud7/tarea7/public";
//http://localhost/PHP/ud7/tarea7/public
//Objeto cliente de la clase Guzzle
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
    echo "Body: " . $response->getBody() . "<br>";
}

function printError($title, $error)
{
    echo "$title - ERROR <br>";
    echo "Error: " . $error->getMessage() . "<br>";
    if ($error instanceof RequestException && $error->hasResponse()) {
        echo "Status Code: " . $error->getResponse()->getStatusCode() . "<br>";
        echo "Response Body: " . $error->getResponse()->getBody() . "<br>";
    }
}

echo "<h1> CLIENTE API REST - PRUEBA ENDPOINTS </h1>";

pruebaGetProducto($BASE__URL, $client);
pruebaGetStock($BASE__URL, $client);
pruebaCrearTienda($BASE__URL, $client);
pruebaEliminarTienda($BASE__URL, $client);

function pruebaGetProducto($BASE__URL, $client)
{
    try {
        $productoId = "3DSNG";
        // $productoId = "3DSNG";
        $response = $client->request('GET', $BASE__URL . "/producto/" . $productoId);
        printResponse("1. GET /producto/ $productoId", $response);
    } catch (RequestException $e) {
        printError("1. GET - ERROR /producto/$productoId", $e);
    }
}

//Problemas con los errores

function pruebaGetStock($BASE__URL, $client)
{
    try {
        $productoId = "3DSNG";
        $response = $client->request('GET', $BASE__URL . '/producto/stock/' . $productoId);
        printResponse("2. GET /producto/stock/ $productoId", $response);
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
        //$response = $client->request('POST', $BASE__URL . '/tienda/' . ['json' => $nuevaTienda]);
        $response = $client->request('POST', 'tiendas', [
            'json' => $nuevaTienda
        ]);

        printResponse("3. POST /tienda - Crear tienda ", $response);
    } catch (RequestException $e) {
        printError("3. POST - ERROR /tienda - Crear tienda ", $e);
    }
}

function pruebaEliminarTienda($BASE__URL, $client)
{
    try {
        $tiendaId = "";
        /*
            $tiendaId = 4;
            $response = $client->request('DELETE', '/tiendas/' . $tiendaId);
        */
        $response = $client->request('DELETE', $BASE__URL . '/tienda/' . $tiendaId);
        printResponse("4. DELETE /tienda - Eliminar tienda ", $response);
    } catch (RequestException $e) {
        printError("4. DELETE -ERROR /tienda - Eliminar tienda ", $e);
    }
}
