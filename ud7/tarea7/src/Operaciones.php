<?php

namespace Clases;

use Clases\Producto;
use Clases\Tienda;
//Clase que recoge las peticiones Rest y utiliza las clases Producto y Familia
//Todo esto es el controller

//Index que recibe las peticiones de la API
/*require '../vendor/autoload.php';
require_once 'Producto.php';
require_once 'Familia.php';
*/



class Operaciones
{
    private $requestMethod;
    private $uri;

    public function __construct($requestMethod, $uri)
    {
        $this->requestMethod = $requestMethod;
        $this->uri = $uri;
    }

    public function processRequest()
    {
        switch ($this->requestMethod) {

            case 'GET':
                if ($this->uri[1] === "producto" && isset($this->uri[2]) && $this->uri[2] != "stock") { //uri 1 es producto, uri 2 es el codigo del producto
                    $response = $this->getProducto();
                }
                if ($this->uri[1] === "producto" && $this->uri[2] === "stock" && isset($this->uri[3])) { //uri 1 es producto, uri 2 es stock y uri 3 es el codigo del producto
                    $response = $this->getStockProducto();
                }
                break;
            case 'POST':
                if ($this->uri[1] === "tiendas") { //uri 1 es tiendas
                    $response = $this->createTiendaFromRequest();
                } else {
                    $response = $this->notFoundResponse("Not Found Response a crearTienda");
                }
                /*{ "nombre": "Aitana",
                "tlf": "942616638"}*/
                break;

            case 'DELETE':
                // Comprobar que se coloque /tiendas/id
                if ($this->uri[1] === "tiendas" && isset($this->uri[2])) {
                    $response = $this->deleteTienda($this->uri[2]); //Se pasa el id de la url para eliminar la tienda
                } else {
                    $response = $this->notFoundResponse("Not Found Response a borrarTienda");
                }
                break;
            case 'OPTIONS':
                $response['status_code_header'] = 'HTTP/1.1 200 OK';
            default:
                $response = $this->notFoundResponse("Not Found Response");
                break;
        }
        header($response['status_code_header']);
        if ($response['body']) {
            echo $response['body'];
        }
    }

    //Error. No se puede procesar la respuesta
    private function unprocessableEntityResponse()
    {
        $response['status_code_header'] = 'HTTP/1.1 422 Unprocessable Entity';
        $response['body'] = json_encode([
            'error' => 'Invalid input'
        ]);
        return $response;
    }

    //Error. No se encuentra
    private function notFoundResponse($texto) //También se podría poner aqui directamente $texto = "Recurso no encontrado"
    {
        $response['status_code_header'] = 'HTTP/1.1 404 Not Found';
        $response['body'] = json_encode(['ERROR' => $texto], JSON_UNESCAPED_UNICODE);
        return $response;
    }

    //Para la parte del get
    private function getProducto() //Instanciamos el producto
    {
        $producto = new Producto();
        $datos = $producto->getProducto($this->uri[2]);
        if ($datos) {
            $response['status_code_header'] = 'HTTP/1.1 200 OK';
            $response['body'] = json_encode($datos, JSON_UNESCAPED_UNICODE);
        } else {
            return $response = $this->notFoundResponse("Producto no encontrado");
        }
        return $response;
    }

    private function getStockProducto()
    {
        $producto = new Producto();
        $codProducto = $this->uri[3];
        $datos = $producto->getStock($codProducto);
        //$datosStock= $producto->getStock($this->uri[3]);
        $response['status_code_header'] = 'HTTP/1.1 200 OK';
        $response['body'] = json_encode($datos);
        return $response;
    }

    //Para la parte de post
    private function createTiendaFromRequest() //Insertar una tienda en la bdd
    {
        $tienda = new Tienda();
        $input = (array) json_decode(file_get_contents('php://input'), TRUE);

        if (!isset($input['nombre'])) {
            return $this->unprocessableEntityResponse();
        }
        $tienda->insert($input);
        $response['status_code_header'] = 'HTTP/1.1 201 Created';
        //$response['body'] = "Tienda creada correctamente";

        $response['body'] = json_encode([
            'message' => 'Tienda creada correctamente'
        ], JSON_UNESCAPED_UNICODE);
        /*if(!$response){
            $this->notFoundResponse();
        }*/
        return $response;
    }



    //Para la parte de delete
    private function deleteTienda($codTienda)
    {
        $tienda = new Tienda();
        $result = $tienda->find($codTienda);
        // if (empty($result)) { //Si el array está vacio, no existe
        //     return $this->notFoundResponse();
        // }

        $tienda->delete($codTienda);

        $response['status_code_header'] = 'HTTP/1.1 200 OK';
        $response['body'] = json_encode(['message' => "Tienda $codTienda eliminada"]);;
        return $response;
    }

    /*
    private function getProducto($codProducto)
    {
        $result = $this->tiendas->find($codProducto);
        if (! $result) {
            return $this->notFoundResponse();
        }
        $response['status_code_header'] = 'HTTP/1.1 200 OK';
        $response['body'] = json_encode($result);
        return $response;
    }*/

    /*
    private function getAllProductos()
    {
        $result = $this->tiendas->findAll();
        $response['status_code_header'] = 'HTTP/1.1 200 OK';
        $response['body'] = json_encode($result);
        return $response;
    }
*/
    /*
    private function createProductoFromRequest()
    {
        $input = (array) json_decode(file_get_contents('php://input'), TRUE);
        if (! $this->validateTienda($input)) {
            return $this->unprocessableEntityResponse();
        }
        $this->tiendas->insert($input);
        $response['status_code_header'] = 'HTTP/1.1 201 Created';
        $response['body'] = "Producto creado con éxito";
        return $response;
    }
    */

    //metodo post: http://localhost/PHP/ud7/pruebaApiRest/public/person?firstname=Aitana&lastname=Gonzalez
    //se pueden colocar los parametros también en key y value, VALE ESTO NO FUNCIONA
    /* Solo funciona colocando el metodo POST y en Body, en raw, pasar los parametros escribiendo esto en el texto o json
    { "firstname": "Aitana",
        "lastname": "González"
    }*/
    /*
    private function deleteProducto($codProducto)
    {
        $result = $this->tiendas->find($codProducto);
        if (! $result) {
            return $this->notFoundResponse();
        }
        $this->tiendas->delete($codProducto);
        $response['status_code_header'] = 'HTTP/1.1 200 OK';
        $response['body'] = null;
        return $response;
    }
        *//*

    private function validateTienda($input)
    {
        if (! isset($input['nombre'])) {
            return false;
        }
        if (! isset($input['tlf'])) {

            return false;
        }
        return true;
    }
    */
}
