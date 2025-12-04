<!DOCTYPE html>
<html>

<head>
    <title>Ejercicios Tipos de Datos</title>
</head>

<body>
    <h3>Tipos de Datos. Actividad 2.1</h3>
    <h4>Ejercicio 10</h4>

    <?php
    /*
    Crea una función mostrarTipo($valor) que imprima con printf: el valor,
    get_debug_type($valor) y resultados de is_int, is_float, is_bool, is_string. Llama a la
    función con: 0, 0.0, "0", true, "", "123", 123.0. Objetivo: observar diferencias sutiles
    entre valores y tipos.
    */
    function mostrarTipo($valor)
    {
        printf("Valor: ");
        var_export($valor);
        printf(
            " | Tipo: %s | is_int: %s | is_float: %s | is_bool: %s | is_string: %s<br>\n",
            get_debug_type($valor),
            is_int($valor) ? 'true' : 'false',
            is_float($valor) ? 'true' : 'false',
            is_bool($valor) ? 'true' : 'false',
            is_string($valor) ? 'true' : 'false'
        );
    }

    // Llamadas individuales a la función
    mostrarTipo(0);
    mostrarTipo(0.0);
    mostrarTipo("0");
    mostrarTipo(true);
    mostrarTipo("");
    mostrarTipo("123");
    mostrarTipo(123.0);

    echo "<br><h3>¡Todos los ejercicios completados!</h3>\n";

    ?>
</body>

</html>