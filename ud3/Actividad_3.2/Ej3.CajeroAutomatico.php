<?php
echo "<h2>Cajero Automático</h2>";
$miCuenta = 1000;
$cuentaAmigo = 500;

function depositarDinero(&$saldo, $cantidad)
{
    echo "Depositando dinero...<br>";
    $saldo += $cantidad;
}
function retirarDinero(&$saldo, $cantidad)
{
    if ($cantidad <= $saldo) {
        echo "Retirando dinero...<br>";
        $saldo -= $cantidad;
        return true;
    } else {
        echo "No se ha podido realizar la operación";
        return false;
    }
}

function aplicarComision(&$saldo, $porcentaje)
{
    $comision = $saldo * ($porcentaje / 100);
    $saldo -= $comision;
}

function transferir(&$saldoOrigen,&$saldoDestino, $cantidad){
    if($cantidad<=$saldoOrigen){
        echo "Transfiriendo dinero...<br>";
        $saldoOrigen-=$cantidad;
        $saldoDestino+=$cantidad;
        return true;
    }else {
        echo "Cantidad insuficiente en el saldo actual para hacer la transferencia.<br>";
        return false;
    }
}

echo "Saldo inicial: $" . $miCuenta . "<br><br>";

depositarDinero($miCuenta, 200);
echo "Después de depositar $200:<br> Mi Cuenta: $" . $miCuenta . "<br><br>";

if(retirarDinero($miCuenta, 150)){
    echo "Retiro exitoso. Saldo actual: $".$miCuenta."<br>";
}

aplicarComision($miCuenta, 2);
echo "Después de comisión del 2%: <br>Mi Cuenta: $" . $miCuenta . "<br><br>";

if(transferir($miCuenta, $cuentaAmigo, 300)){
    echo "Transferencia exitosa<br>";
    echo "Mi cuenta: $". $miCuenta. "<br>";
    echo "Cuenta amigo: $".$cuentaAmigo."<br>";
}
else{
    echo "Transferencia fallida";
}

?>