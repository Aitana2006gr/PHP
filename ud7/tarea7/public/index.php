<?php
//Index que recibe las peticiones de la API
require '../vendor/autoload.php';
use Clases\Operaciones;

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
//$BASE_URI = "/PHP/ud7/tarea7/public"; //La url base en clase// Te recuerdo tmb tocar el $base_uri en el cliente guzzle.php
$BASE_URI = "/GitHub/PHP/PHP/ud7/tarea7/public"; //La url base en casa
$parsedURI = parse_url($_SERVER["REQUEST_URI"]); //El request uri es toda la base uri mas lo que llega extra 
$endpointName = str_replace($BASE_URI, "", $parsedURI["path"]); //Reemplaza la ruta base por espacio en blanco
$uri = explode('/', $endpointName);

// los endpoints comienzan con /producto todo lo demás es un 404 not found
// if ($uri[1] !== 'producto') {
//     header("HTTP/1.1 404 Not Found");
//     exit();
// }
//Con esto se puede utilizar ya /producto/{id}, /producto/stock/{id} y /tiendas
if (!in_array($uri[1], ['producto', 'tiendas'])) {
    header("HTTP/1.1 404 Not Found");
    exit();
}

$requestMethod = $_SERVER["REQUEST_METHOD"];
//pasamos la petición y el userid al Controller para que procese la petición
$operaciones = new Operaciones($requestMethod, $uri);
$operaciones->processRequest();


//http://localhost/php/ud7/pruebaApiRest/public/person

//ENDPOINTS PARA COMPROBAR SI TODO FUNCIONA

//GET http://localhost/PHP/ud7/tarea7/public/producto/3DSNG

//GET http://localhost/PHP/ud7/tarea7/public/producto/stock/3DSNG

/*
POST /tiendas
{
  "nombre": "Nueva tienda",
  "tlf": "600123123"
}
  */

//DELETE /tiendas/4

/* Insertar un nuevo producto
Método: POST

Endpoint: /producto (suponiendo que lo implementes)

Body JSON:
{
  "cod": "NEWPROD1",
  "nombre": "Producto Nuevo",
  "nombre_corto": "ProdNuevo",
  "descripcion": "Descripción del producto nuevo",
  "PVP": 99.99,
  "familia": "MULTIF"
}*/ 

/* Eliminar un producto
Método: DELETE

Endpoint: /producto/{codProducto}

Ejemplo: /producto/NEWPROD1

Objetivo: Eliminar un producto concreto*/

/* TABLA STOCK
a) Obtener todos los stocks

Método: GET

Endpoint: /stock (puedes simularlo con un join si lo implementas)

Objetivo: Listar todos los productos en todas las tiendas.

b) Obtener stock por tienda

Método: GET

Endpoint: /stock/tienda/{idTienda}

Objetivo: Mostrar todos los productos disponibles en una tienda concreta.

c) Insertar stock nuevo

Método: POST

Endpoint: /stock

Body JSON:

{
  "producto": "3DSNG",
  "tienda": 2,
  "unidades": 5
}


Objetivo: Añadir stock de un producto a una tienda concreta.

d) Modificar stock

Método: PUT

Endpoint: /stock/{producto}/{tienda}

Body JSON:

{
  "unidades": 10
}

Objetivo: Cambiar la cantidad de stock de un producto en una tienda.*/

/*4️⃣ Familia
a) Listar familias

Método: GET

Endpoint: /familia

Objetivo: Mostrar todas las familias (cod, nombre).

b) Obtener productos de una familia

Método: GET

Endpoint: /familia/{cod}/productos

Ejemplo: /familia/CONSOL/productos*/
