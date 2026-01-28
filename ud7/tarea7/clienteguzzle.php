<?php
require 'vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

$BASE__URL = "http://localhost/PHP/ud7/tarea7/public";
//$BASE__URL = "http://localhost/GitHub/PHP/PHP/ud7/tarea7/public";
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
pruebaEliminarTienda($BASE__URL, $client, 4);

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
        $response = $client->request('POST', $BASE__URL. '/tiendas', ['json' => $nuevaTienda]);

        printResponse("3. POST /tienda - Crear tienda ", $response);
    } catch (RequestException $e) {
        printError("3. POST - ERROR /tienda - Crear tienda ", $e);
    }
}

function pruebaEliminarTienda($BASE__URL, $client, $tiendaId)
{
    try {
        //$tiendaId = "8";
        /*
            $tiendaId = 4;
            $response = $client->request('DELETE', '/tiendas/' . $tiendaId);
        */
        $response = $client->request('DELETE', $BASE__URL . '/tiendas/' . $tiendaId);
        printResponse("4. DELETE /tienda - Eliminar tienda ", $response);
    } catch (RequestException $e) {
        printError("4. DELETE -ERROR /tienda - Eliminar tienda ", $e);
    }
}

/*
function printResponse($titulo, $response) {
    echo "\n===== $titulo =====\n";
    echo "Status: " . $response->getStatusCode() . "\n";
    echo $response->getBody() . "\n";
}

function pruebaGetAllProductos($BASE_URL, $client){
    $response = $client->get('/producto');
    printResponse("GET $BASE_URL/producto", $response);
}

function pruebaCrearProducto($BASE_URL, $client){
    $data = [
        "nombre" => "Producto Test",
        "nombre_corto" => "Test Corto",
        "descripcion" => "Producto creado desde Guzzle",
        "PVP" => 50,
        "familia" => "MULTIF"
    ];

    $response = $client->post('/producto', ['json' => $data]);
    printResponse("POST $BASE_URL/producto", $response);
}

function pruebaEliminarProducto($BASE_URL, $client){
    $cod = "Test Corto";
    $response = $client->delete("/producto/$cod");
    printResponse("DELETE $BASE_URL/producto/$cod", $response);
}

function pruebaGetTiendas($BASE_URL, $client){
    $response = $client->get('/tiendas');
    printResponse("GET $BASE_URL/tiendas", $response);
}

function pruebaGetStockGeneral($BASE_URL, $client){
    $response = $client->get('/stock');
    printResponse("GET $BASE_URL/stock", $response);
}

function pruebaCrearStock($BASE_URL, $client){
    $data = [
        "producto" => "3DSNG",
        "tienda" => 1,
        "unidades" => 99
    ];

    $response = $client->post('/stock', ['json' => $data]);
    printResponse("POST $BASE_URL/stock", $response);
}

function pruebaUpdateStock($BASE_URL, $client){
    $producto = "3DSNG";
    $tienda = 1;

    $data = ["unidades" => 55];

    $response = $client->put("/stock/$producto/$tienda", ['json' => $data]);
    printResponse("PUT $BASE_URL/stock/$producto/$tienda", $response);
}

function pruebaGetFamilias($BASE_URL, $client){
    $response = $client->get('/familia');
    printResponse("GET $BASE_URL/familia", $response);
}

pruebaGetAllProductos($BASE_URL, $client);
pruebaCrearProducto($BASE_URL, $client);
pruebaEliminarProducto($BASE_URL, $client);

pruebaGetTiendas($BASE_URL, $client);

pruebaGetStockGeneral($BASE_URL, $client);
pruebaCrearStock($BASE_URL, $client);
pruebaUpdateStock($BASE_URL, $client);

pruebaGetFamilias($BASE_URL, $client);

*/
