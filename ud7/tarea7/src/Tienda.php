<?php

namespace Clases;

use PDO;
use PDOException;

class Tienda extends Conexion
{
    public function __construct()
    {
        parent::__construct();
    }

    public function findAll()
    {
        $statement = "
                    SELECT
                    cod, nombre, tlf
                    FROM
                    tienda;
                    ";
        try {
            $statement = $this->conexion->query($statement);
            $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }
    
    public function find($codTienda)
    {
        $statement = "
                    SELECT
                    cod, nombre, tlf
                    FROM
                    tienda
                    WHERE cod = ?;
                    ";
        try {
            $statement = $this->conexion->prepare($statement);
            $statement->execute(array($codTienda));
            $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function insert(array $input)
    {
        $statement = "
                    INSERT INTO tienda
                    (nombre, tlf)
                    VALUES
                    (:nombre, :tlf);
                    ";
        try {
            $statement = $this->conexion->prepare($statement);
            $statement->execute(array(
                'nombre' => $input['nombre'],
                'tlf' => $input['tlf'] ?? null,
            ));
            return $statement->rowCount();
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function delete($codTienda)
    {
        $statement = "
                    DELETE FROM tienda
                    WHERE cod = :cod;
                    ";
        try {
            $statement = $this->conexion->prepare($statement);
            $statement->execute(array('cod' => $codTienda));
            return $statement->rowCount();
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }
}
