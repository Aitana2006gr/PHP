<?php
require_once("Cuenta.php");
class CuentaCorriente extends Cuenta
{
    private $cuota;

    public function __construct($numero, $titular, $saldo, $cuota)
    {
        parent::__construct($numero, $titular, $saldo);
        $this->cuota = $cuota;
        $this->saldo -= $cuota;
    }

    public function reintegro($cantidad)
    {
        if ($this->saldo < 20) {
            echo "<p>No se puede realizar el reintegro: saldo inferior a 20 </p>";
            return;
        }
        return parent::reintegro($cantidad);
    }

    public function mostrar()
    {
        return parent::mostrar() . "
        <p>Cuota mantenimiento:{$this->cuota} €</p>
        ";
    }
}
