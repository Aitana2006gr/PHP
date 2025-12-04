<!DOCTYPE html>
<html>

<head>
    <title>Ejercicios Tipos de Datos</title>
</head>

<body>
    <h3>Tipos de Datos. Actividad 2.1</h3>
    <h4>Ejercicio 7</h4>
    <p>Construye un texto multilínea con heredoc que incluya variables $nombre, $edad y $saldo (formatea $saldo con number_format o sprintf).<br>
        Muestra el bloque con echo y añade una línea final con print. Objetivo: salidas legibles en varias líneas.
    </p>
    <?php
    $nombre = "Gabriel";
    $edad = 24;
    $saldo = 2400.475;
    $formateado = number_format($saldo, 2);
    //poner el pre
    $texto = <<<TEXTO
        <pre>======INFO========
        Nombre: $nombre
        Edad: $edad años
        Saldo: $saldo euros
        Saldo: $formateado euros
        ========================
        <pre>
        TEXTO;
    //El <pre> mantiene los saltos de línea y espacios del bloque de texto
    //El bloque de texto se inicia con <<< seguido de un identificador (TEXTO en este caso)
    echo $texto;
    print "Linea final";
    echo "<br><br>Aitana";

    ?>
</body>

</html>