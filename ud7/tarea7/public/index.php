<?php
//Index que recibe las peticiones de la API

use Clases\Operaciones;

require '../vendor/autoload.php';

//use Clases\Controller;

header("Access-Control-Allow-Origin: *"); //Permito todos los origenes para que me llamen
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers,Authorization, X-Requested-With"); //
header("Access-Control-Allow-Methods: OPTIONS, GET, POST, PUT, DELETE");
header("Content-Type: application/json; charset=UTF-8"); //Tipo de caracteres
header("Access-Control-Max-Age: 3600"); //

// Manejar la petición de verificación preliminar de CORS.
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    // No hacer nada más y finalizar el script después de enviar los encabezados de CORS.
    exit(0);
}

//eliminamos la parte del path que no corresponde a los puntos de entrada del API
$BASE_URI = "/PHP/ud7/tarea7/public"; //La url base
$parsedURI = parse_url($_SERVER["REQUEST_URI"]); //El request uri es toda la base uri mas lo que llega extra 
$endpointName = str_replace($BASE_URI, "", $parsedURI["path"]); //Reemplaza la ruta base por espacio en blanco
$uri = explode('/', $endpointName);

// los endpoints comienzan con /producto todo lo demás es un 404 not found
if ($uri[1] !== 'producto') {
    header("HTTP/1.1 404 Not Found");
    exit();
}

$requestMethod = $_SERVER["REQUEST_METHOD"];
//pasamos la petición y el userid al Controller para que procese la petición
$operaciones = new Operaciones($requestMethod, $uri);
$operaciones->processRequest();

//http://localhost/php/ud7/pruebaApiRest/public/person
