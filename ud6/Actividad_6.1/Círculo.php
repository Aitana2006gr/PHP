<?php
class Circulo
{
    private $radio;
    public function __construct($radio)
    {
        $this->radio = $radio;
    }

    //Métodos setRadio y getRadio
    public function setRadio($radio)
    {
        $this->radio = $radio;
    }
    public function getRadio($radio)
    {
        return $this->$radio;
    }
    

    //Métodos mágicos __set y __get
    public function __set($radio, $valor)
    {
        if (property_exists(__CLASS__, $radio)) {
            $this->$radio = $valor;
        } else {
            echo "No existe el atributo $radio";
        }
    }

    public function __get($radio)
    {
        if (property_exists(__CLASS__, $radio)) {
            return $this->radio;
        } else {
            return NULL;
        }
    }
}
