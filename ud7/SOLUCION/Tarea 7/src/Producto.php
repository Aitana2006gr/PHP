<?php

namespace Clases;

use PDO;
use PDOException;
class Producto extends Conexion
{
   public function __construct(){
       parent::__construct();
   }
   public function getProducto($codProducto){
       $sql = "SELECT nombre_corto, descripcion FROM producto WHERE cod = :codProducto ";
       try {
           $stmt = $this->conexion->prepare($sql);
           $stmt->bindParam(":codProducto", $codProducto, PDO::PARAM_INT);
           $stmt->execute();
           $result = $stmt->fetch(PDO::FETCH_ASSOC);
           return $result ? $result : null;
       } catch (PDOException $e) {
           error_log($e->getMessage());
           return null;
       }
   }

   public function getStockProducto($codProducto){
       $sql = "SELECT p.nombre_corto, p.PVP, s.unidades, t.nombre as tienda
               FROM producto p
               INNER JOIN stock s ON p.cod = s.producto
               INNER JOIN tienda t ON s.tienda = t.cod
               WHERE p.cod = :codProducto";
       try {
           $stmt = $this->conexion->prepare($sql);
           $stmt->bindParam(":codProducto", $codProducto, PDO::PARAM_INT);
           $stmt->execute();
           $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
           return $result ? $result : null;
       } catch (PDOException $e) {
           error_log($e->getMessage());
           return null;
       }
   }


}