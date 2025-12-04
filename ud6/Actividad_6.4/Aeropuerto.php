<?php
require_once "ElementoVolador.php";

class Aeropuerto {

    private array $elementos;

    public function __construct() {
        $this->elementos = [];
    }

    //Para insertar un elemento volador
    public function insertar(ElementoVolador $e) {
        $this->elementos[] = $e;
    }

    //Buscar por nombre
    public function buscar(string $nombre) {
        foreach ($this->elementos as $e) {
            if ($e->getNombre() === $nombre) {
                echo "<br>Elemento encontrado:<br>";
                $e->mostrarInformacion();
                return $e;
            }
        }
        echo "<br>No se encontró el elemento '$nombre'.<br>";
        return null;
    }

    //Listar por compañía
    public function listarCompania(string $compania) {
        $encontrados = false;

        foreach ($this->elementos as $e) {
            if ($e instanceof Avion && $e->getCompaniaAerea() === $compania) {
                $encontrados = true;
                $e->mostrarInformacion();
            }
        }

        if (!$encontrados) {
            echo "<br>No existen aviones de la compañía '$compania'.<br>";
        }
    }

    //Listar helicópteros con un número específico de rotores
    public function rotores(int $nRotor) {
        $ok = false;

        foreach ($this->elementos as $e) {
            if ($e instanceof Helicoptero && $e->getNRotor() == $nRotor) {
                $ok = true;
                $e->mostrarInformacion();
            }
        }

        if (!$ok) {
            echo "<br>No existen helicópteros con $nRotor rotores.<br>";
        }
    }

    //Método despegar
    public function despegar(string $nombre, int $altitud, int $velocidad) {

        foreach ($this->elementos as $e) {
            if ($e->getNombre() === $nombre) {
                $e->acelerar($velocidad);
                $e->volar($altitud);
                return $e;
            }
        }

        echo "<br>No se encontró el elemento '$nombre' para despegar.<br>";
        return null;
    }
}
?>
