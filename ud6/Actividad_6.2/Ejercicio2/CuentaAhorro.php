<?php
class CuentaAhorro extends Cuenta
{
    private $comisionApertura; //se lo resta al saldo y el interés
    private $intereses;

    public function __construct(
        $numero,
        $titular,
        $saldo,
        $comisionApertura,
        $intereses
    ) {
        parent::__construct($numero, $titular, $saldo);
        $this->comisionApertura = $comisionApertura;
        $this->intereses = $intereses;
        $this->saldo -= $this->comisionApertura;
    }

    public function aplicaInteres()
    {
        $this->saldo += $this->saldo * ($this->intereses / 100);
    }

    public function reintegro($cantidad)
    {
        $this->saldo -= $cantidad;
    }

    public function mostrar()
    {
        return parent::mostrar() . "
        <p>Comisión de apertura:{$this->comisionApertura}</p>
        <p>Interés anual:{$this->intereses}/p>
        ";
    }
}
