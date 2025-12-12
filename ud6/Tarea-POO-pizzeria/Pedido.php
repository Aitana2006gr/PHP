<?php
class Pedido
{
    private $numero;
    private $f_pago;
    private $fecha;
    private $importe;
    function __construct($numero, $f_pago, $fecha, $importe)
    {
        $this->numero = $numero;
        $this->f_pago = $f_pago;
        $this->fecha = $fecha;
        $this->importe = $importe;
    }
    
    public function getNumero()
    {
        return $this->numero;
    }

    public function getF_pago()
    {
        return $this->f_pago;
    }

    public function getFecha()
    {
        return $this->fecha;
    }
    
    public function getImporte()
    {
        return $this->importe;
    }
}
