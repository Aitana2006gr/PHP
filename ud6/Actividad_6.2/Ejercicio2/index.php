<?php 
require_once("Cuenta.php");
require_once("CuentaCorriente.php");
require_once("CuentaAhorro.php");
$c=new CuentaCorriente("0073", "Aitana", 1000, 15);
echo $c -> mostrar();
echo $c-> reintegro(300);
echo $c -> mostrar(); 
$c2=new CuentaAhorro("1717", " Sett", 1700, 60 ,10);
echo $c2-> aplicaInteres();
echo $c2-> mostrar();
echo $c2 -> reintegro(20);
echo $c2-> mostrar();
//comprobar y hacer insnve off

?>