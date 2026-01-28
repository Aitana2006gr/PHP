<?php

namespace Clases;

use PDO;
use PDOException;

class Producto extends Conexion
{
    public function __construct()
    {
        parent::__construct();
    }

    public function findAll()
    {
        $statement = "
                    SELECT
                    cod, nombre, precio, descripcion
                    FROM
                    producto;
                    ";
        try {
            $statement = $this->conexion->query($statement);
            $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function find($codProducto)
    {
        $statement = "
                    SELECT
                    cod, nombre, precio, descripcion
                    FROM
                    producto
                    WHERE cod = ?;
                    ";
        try {
            $statement = $this->conexion->prepare($statement);
            $statement->execute(array($codProducto));
            $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function getProducto($codProducto)
    {
        $sql = "SELECT nombre_corto, descripcion FROM PRODUCTO WHERE cod= :codProducto";
        try {
            $stmt = $this->crearConexion()->prepare($sql);
            //$stmt->bindParam(":codProducto", $codProducto, PDO::PARAM_INT); esto no lo uso porque es una cadena, no numeros solamente
            $stmt->bindParam(":codProducto", $codProducto, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    //MODIFICAR TODAVIA
    public function getStock($codProducto)
    {
        $sql = "SELECT t.nombre, s.unidades 
            FROM tienda t 
            INNER JOIN stock s ON t.cod = s.tienda 
            WHERE s.producto = :codProducto";
        try {
            $stmt = $this->crearConexion()->prepare($sql);
            //$stmt->bindParam(":codProducto", $codProducto, PDO::PARAM_INT);
            $stmt->bindParam(":codProducto", $codProducto, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function insert(array $input)
    {
        $statement = "
                    INSERT INTO producto
                    (nombre, nombre_corto, descripcion, PVP, familia)
                    VALUES
                    (:nombre, :nombre_corto, :descripcion, :PVP, :familia);
                    ";
        try {
            $statement = $this->conexion->prepare($statement);
            $statement->execute(array(
                'nombre' => $input['nombre'] ?? null,
                'nombre_corto' => $input['nombre_corto'],
                'descripcion' => $input['descripcion'] ?? null,
                'PVP' => $input['PVP'],
                'familia' => $input['familia'],
            ));
            return $statement->rowCount();
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function delete($codProducto)
    {
        $statement = "
                    DELETE FROM producto
                    WHERE cod = :cod;
                    ";
        try {
            $statement = $this->conexion->prepare($statement);
            $statement->execute(array('cod' => $codProducto));
            return $statement->rowCount();
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }
}
