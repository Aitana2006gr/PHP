<?php
//Index que recibe las peticiones de la API
require '../vendor/autoload.php';

use Clases\PersonController;
use Clases\Login;

require "validate_token.php";

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers,Authorization, X-Requested-With");
header("Access-Control-Allow-Methods: OPTIONS, GET, POST, PUT, DELETE");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Max-Age: 3600");

// Manejar la petición de verificación preliminar de CORS.
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    // No hacer nada más y finalizar el script después de enviar los encabezados de CORS.
    exit(0);
}

//eliminamos la parte del path que no corresponde a los puntos de entrada del API
$BASE_URI = "/PHP/ud7/seguridad_JWT/public";
$parsedURI = parse_url($_SERVER["REQUEST_URI"]);
$endpointName = str_replace($BASE_URI, "", $parsedURI["path"]);
$uri = explode('/', $endpointName);

// los endpoints comienzan con /person todo lo demás es un 404 not found
if ($uri[1] !== 'person' && $uri[1] !== "login") {
    header("HTTP/1.1 404 Not Found");
    exit();
}

$requestMethod = $_SERVER["REQUEST_METHOD"];
//http://localhost/php/ud7/seguridad_JWT/public/person
if ($uri[1] === "person") {
    if (validate() == 200) {
        // el user id es opcional y debe ser un número
        $userId = null;
        if (isset($uri[2])) {
            $userId = (int) $uri[2];
        }

        //pasamos la petición y el userid al personController para que procese la petición
        $controller = new PersonController($requestMethod, $userId);
        $controller->processRequest();
    }
    //http://localhost/php/ud7/seguridad_JWT/login
} else if ($uri[1] === "login") {
    $controller = new Login($requestMethod);
    $controller->processRequest();
}
