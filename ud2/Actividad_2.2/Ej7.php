<!DOCTYPE html>
<html>

<head>
    <title>Ejercicios Tipos de Datos</title>
</head>

<body>
    <h2>Tipos de Datos. Actividad 2.1</h2>
    <h3>Ejercicio 7</h3>

    <?php
    /*7. Ámbito local vs global (II):
    o Repite el ejercicio anterior, pero dentro de la función
    procesarCompra($monto) usa global $saldo, $transacciones; antes de
    modificar las variables.
    o Llama a la función con procesarCompra(300) y muestra los valores de
    $saldo y $transacciones fuera de la función.
    o Compara y explica la diferencia entre este resultado y el del ejercicio
    anterior.*/

    $saldo=1000;
    $transacciones=0;

    function procesarCompra($monto) : string {
        global $saldo; //tengo que volver a definir la variable porque sino no me la lee fuera de la función
        global $transacciones; //lo mismo que con el saldo
        $resultado=$saldo-$monto;
        $transacciones++;
        echo "Dentro de la función: <br>";
        echo "saldo: ".$saldo."<br>";
        echo "transacciones: ".$transacciones."<br>";
        return "Te queda de saldo: ".$resultado."<br><br>";
    }

    
    echo "DEFINIENDO variables globales (Fuera de la función):<br>";
    echo "saldo: ".$saldo."<br>";
    echo "transacciones: ".$transacciones."<br><br>";
    echo procesarCompra(200);
    ?>
</body>

</html>