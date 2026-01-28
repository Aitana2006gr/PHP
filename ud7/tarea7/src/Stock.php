<?php
namespace Clases;

use PDO;

class Stock extends Conexion
{
    public function findAll()
    {
        $sql = "SELECT * FROM stock";
        return $this->conexion->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert($input)
    {
        $sql = "INSERT INTO stock (producto, tienda, unidades) VALUES (:producto, :tienda, :unidades)";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute($input);
    }

    public function update($producto, $tienda, $unidades)
    {
        $sql = "UPDATE stock SET unidades = :u WHERE producto = :p AND tienda = :t";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute(['u'=>$unidades,'p'=>$producto,'t'=>$tienda]);
    }

    private function getStock()
{
    $stock = new Stock();
    return [
        'status_code_header' => 'HTTP/1.1 200 OK',
        'body' => json_encode($stock->findAll())
    ];
}

private function createStock()
{
    $stock = new Stock();
    $input = json_decode(file_get_contents('php://input'), true);
    $stock->insert($input);

    return [
        'status_code_header' => 'HTTP/1.1 201 Created',
        'body' => json_encode(['message' => 'Stock insertado'])
    ];
}

private function updateStock($producto, $tienda)
{
    $stock = new Stock();
    $input = json_decode(file_get_contents('php://input'), true);
    $stock->update($producto, $tienda, $input['unidades']);

    return [
        'status_code_header' => 'HTTP/1.1 200 OK',
        'body' => json_encode(['message' => 'Stock actualizado'])
    ];
}

}
