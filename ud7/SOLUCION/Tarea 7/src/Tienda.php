<?php

    namespace Clases;

    class Tienda extends Conexion
    {
        public function __construct(){
            parent::__construct();
        }
        public function insert(Array $input)
        {
            $statement = "

            INSERT INTO tienda (nombre, tlf)
            VALUES (:nombre, :tlf)
        ";

            try {
                $statement = $this->conexion->prepare($statement);
                $statement->execute(array(
                    'nombre' => $input['nombre'],
                    'tlf'  => $input['tlf']
                ));
                return $statement->rowCount();
            } catch (\PDOException $e) {
                error_log($e->getMessage());
                return 0;
            }
        }

        public function delete(Array $input)
        {
            $statement = "
            DELETE FROM tienda
            WHERE cod = :cod
        ";

            try {
                $statement = $this->conexion->prepare($statement);
                $statement->execute(array('cod' =>  $input['cod']));
                return $statement->rowCount();
            } catch (\PDOException $e) {
                error_log($e->getMessage());
                return 0;
            }
        }
    }