<?php
class Usuario {
    //Atributos
    private $nombre;
    private $contrasena;

    //Constructor
    public function __construct( $nombre,  $contrasena) {
        $this->nombre = $nombre;
        $this->contrasena = $contrasena;
    }

    //Getters
    public function getNombre() { return $this->nombre; }
    public function getContrasena(){ return $this->contrasena; }
}
