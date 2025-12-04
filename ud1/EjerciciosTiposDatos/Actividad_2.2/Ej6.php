<!DOCTYPE html>
<html>

<head>
    <title>Ejercicios Tipos de Datos</title>
</head>

<body>
    <h2>Tipos de Datos. Actividad 2.1</h2>
    <h3>Ejercicio 6</h3>

    <?php
    /*6. Ámbito local vs global (I)
    o Declara fuera de cualquier función $saldo = 1000 y $transacciones = 0.
    o Crea una función procesarCompra($monto) que intente restar el monto
    del saldo y aumentar las transacciones en 1, sin usar global
    o Llama a la función con procesarCompra(200) y muestra tanto $saldo
    como $transacciones fuera de la función.
    o Observa qué valores tienen las variables globales después de llamar la
    función.*/
    //fuera de la funcion
    $saldo=1000;
    $transacciones=0;

    function procesarCompra($monto) : string {
        $saldo=1000; //tengo que volver a definir la variable porque sino no me la lee fuera de la función
        $transacciones=0; //lo mismo que con el saldo
        $resultado=$saldo-$monto;
        $transacciones++;
        echo "Dentro de la función: <br>";
        echo "saldo: ".$saldo."<br>";
        echo "transacciones: ".$transacciones."<br>";
        return "Te queda de saldo: ".$resultado."<br><br>";
    }

    
    echo "SIN definir variables globales (Fuera de la función):<br>";
    echo "saldo: ".$saldo."<br>";
    echo "transacciones: ".$transacciones."<br><br>";
    echo procesarCompra(200);

    ?>
</body>

</html>