<?php

namespace Clases;

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
        // Inicializar respuesta por defecto
        $response = $this->notFoundResponse();

        switch ($this->requestMethod) {
            case 'GET':
                if ($this->uri[1]==="producto" && isset($this->uri[2]) && $this->uri[2]!="stock") {
                     $response=$this->getProducto();
                } elseif ($this->uri[1]==="producto" && isset($this->uri[2]) && $this->uri[2]==="stock" && isset($this->uri[3])) {
                    $response=$this->getStockProducto();
                }
                break;
            case 'POST':
                if ($this->uri[1]==="tienda"){
                    $response=$this->createTienda();
                }
                break;
            case 'DELETE':
                if ($this->uri[1]==="tienda"){
                    $response=$this->deleteTienda();
                }
                break;
            default:
                $response = $this->notFoundResponse();
                break;
        }
        header($response['status_code_header']);
        if ($response['body']) {
            echo $response['body'];
        }
    }

    private function getProducto(){
        $producto = new Producto();
        $data = $producto->getProducto($this->uri[2]);

        if ($data) {
            $response['status_code_header'] = 'HTTP/1.1 200 OK';
            $response['body'] = json_encode($data, JSON_UNESCAPED_UNICODE);
        } else {
            $response['status_code_header'] = 'HTTP/1.1 404 Not Found';
            $response['body'] = json_encode(['error' => 'Producto no encontrado'], JSON_UNESCAPED_UNICODE);
        }
        return $response;
    }

    private function createTienda(){
        $tienda = new Tienda();
        $input = (array) json_decode(file_get_contents('php://input'), TRUE);
        $result = $tienda->insert($input);

        if ($result) {
            $response['status_code_header'] = 'HTTP/1.1 201 Created';
            $response['body'] = json_encode(['success' => true, 'message' => 'Tienda creada con éxito'], JSON_UNESCAPED_UNICODE);
        } else {
            $response['status_code_header'] = 'HTTP/1.1 500 Internal Server Error';
            $response['body'] = json_encode(['error' => 'Error al crear la tienda'], JSON_UNESCAPED_UNICODE);
        }
        return $response;
    }

    private function deleteTienda(){
        $tienda = new Tienda();
        $input = (array) json_decode(file_get_contents('php://input'), TRUE);
        $result = $tienda->delete($input);

        if ($result) {
            $response['status_code_header'] = 'HTTP/1.1 204 No Content';
            $response['body'] = null;
        } else {
            $response['status_code_header'] = 'HTTP/1.1 404 Not Found';
            $response['body'] = json_encode(['error' => 'Tienda no encontrada'], JSON_UNESCAPED_UNICODE);
        }
        return $response;
    }

    private function getStockProducto(){
        $producto = new Producto();
        $data = $producto->getStockProducto($this->uri[3]);

        if ($data) {
            $response['status_code_header'] = 'HTTP/1.1 200 OK';
            $response['body'] = json_encode($data, JSON_UNESCAPED_UNICODE);
        } else {
            $response['status_code_header'] = 'HTTP/1.1 404 Not Found';
            $response['body'] = json_encode(['error' => 'Stock no encontrado'], JSON_UNESCAPED_UNICODE);
        }
        return $response;
    }

    private function notFoundResponse(){
        $response['status_code_header'] = 'HTTP/1.1 404 Not Found';
        $response['body'] = json_encode(['error' => 'Endpoint no encontrado'], JSON_UNESCAPED_UNICODE);
        return $response;
    }
}