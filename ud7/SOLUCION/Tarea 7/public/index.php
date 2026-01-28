<?php
require '../vendor/autoload.php';
use Clases\Operaciones;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
header("Access-Control-Allow-Methods: OPTIONS, GET, POST, PUT, DELETE");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Max-Age: 3600");
// Manejar la petición de verificación preliminar de CORS.
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
// No hacer nada más y finalizar el script después de enviar los encabezados de
    exit(0);
}
//eliminamos la parte del path que no corresponde a los puntos de entrada del API
$BASE_URI = "/ud7/tarea7/public";

$parsedURI = parse_url($_SERVER["REQUEST_URI"]);
$endpointName = str_replace($BASE_URI, "", $parsedURI["path"]);
$uri = explode( '/', $endpointName);

$registro_recursos = array("producto","tienda");
// los endpoints comienzan con producto o tiendas todo lo demás es un 404 not found
if ( !in_array($uri[1],$registro_recursos) ){
    header("HTTP/1.1 404 Not Found");
    exit();
}

$requestMethod = $_SERVER["REQUEST_METHOD"];

$operaciones = new Operaciones($requestMethod, $uri);
$operaciones->processRequest();