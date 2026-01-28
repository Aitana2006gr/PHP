<?php
namespace Clases;

use PDO;

class Familia extends Conexion
{
    public function findAll()
    {
        return $this->conexion->query("SELECT * FROM familia")
                              ->fetchAll(PDO::FETCH_ASSOC);
    }

    
}
