<?php
require 'vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

$BASE__URL = "http://localhost/ud7/tarea7/public";

//Objeto cliente de la clase Guzzle
$client = new Client( [
   'base_uri' => $BASE__URL,
   'timeout'  => 5.0,
   'headers'  => [
       'Content-Type' => 'application/json',
       'Accept' => 'application/json',
   ]
]);

function printResponse($title,  $response)
{
    echo "$title<br>";
    echo "Status Code:" . $response->getStatusCode(). "<br>";
    echo "Body:" . $response->getBody(). "<br>";
}
function printError($title,  $error)
{
    echo "$title - ERROR <br>";
    echo "Error: " . $error->getMessage(). "<br>";
    if ($error instanceof RequestException && $error->hasResponse()) {
        echo "Status Code: " . $error->getResponse()->getStatusCode() . "<br>";
        echo "Response Body: " . $error->getResponse()->getBody() . "<br>";
    }
}

echo " CLIENTE API REST - PRUEBA ENDPOINTS <br> <br>";
try{
    $productoId = "3DSNG";
    $response = $client->request('GET', $BASE__URL.'/producto/'.$productoId);
    printResponse("1. GET /producto/$productoId", $response);
}catch (RequestException $e){
    printError("1. GET /producto/$productoId", $e);
}

try{
    $productoId = "1";
    $response = $client->request('GET', $BASE__URL.'/producto/'.$productoId);
    printResponse("2. GET /producto/$productoId", $response);
}catch (RequestException $e){
    printError("2. GET /producto/$productoId", $e);
}

try{
    $productoId = "3DSNG";
    $response = $client->request('GET', $BASE__URL.'/producto/stock/'.$productoId);
    printResponse("3. GET /producto/stock/$productoId", $response);
}catch (RequestException $e){
    printError("3. GET /producto/stock/$productoId", $e);
}

try {
    $nuevaTienda = [
        'nombre' => 'Tienda Guzzle',
        'tlf' => '666777999'
    ];
    $response = $client->request('POST', $BASE__URL.'/tienda', [ 'json' => $nuevaTienda ]);
    printResponse("4. POST /tienda - Crear tienda", $response);
} catch (RequestException $e) {
    printError("4. POST /tienda - Crear tienda", $e);
}

