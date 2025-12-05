<?php
require_once "Avion.php";
require_once "Helicoptero.php";

class Aeropuerto {
    //Atributo
    private $elementos;

    //Constructor
    public function __construct(){
        $this->elementos = []; //Inicializo como array
    }

    //Método insertar
    public function insertar($e){
        $this->elementos[] = $e;
    }

    //Método buscar
    public function buscar($nombre){
        foreach($this->elementos as $e){
            if($e->getNombre() == $nombre){
                $e->mostrarInformacion();
                return;
            }
        }
        echo "Error: No se ha podido encontrar<br>";
    }

    //Método listarCompania
    public function listarCompania($compania){
        $encontrado = false;
        foreach($this->elementos as $e){
            if($e instanceof Avion && $e->getCompania() == $compania){
                $e->mostrarInformacion();
                $encontrado = true;
            }
        }
        if(!$encontrado){
            echo "Error: No se ha podido encontrar la compañía<br>";
        }
    }

    //Método rotores
    public function rotores($nRotor){
        $encontrado = false;
        foreach($this->elementos as $e){
            if($e instanceof Helicoptero && $e->getNRotor() == $nRotor){
                $e->mostrarInformacion();
                $encontrado = true;
            }
        }
        if(!$encontrado){
            echo "Error: No se han encontrado helicopteros con ese número de rotores<br>";
        }
    }

    //Método despegar
    public function despegar($nombre, $altitud, $velocidad){
        foreach($this->elementos as $e){
            if($e->getNombre() == $nombre){
                $e->acelerar($velocidad);
                $e->volar($altitud);
                return $e;
            }
        }
        echo "Error: No se ha podido despegar<br>";
        return null;
    }
}
?>
