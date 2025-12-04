<!DOCTYPE html>
<html>

<head>
    <title>Ejercicios Estructuras de control</title>
</head>

<body>
    <h3>Actividad 3.1</h3>
    <h4>Ejercicio d</h4>

    <?php
    /*Visualizar aquellos números de 3 cifras que cumplen que la suma de sus dígitos es igual
    al producto de los mismos. Por ejemplo 123, donde 1+2+3 = 1*2*3*/
    for ($i = 100; $i <= 999; $i++) { //Empiezo el bucle para que empiece a iterar desde 100 porque es el primer numero de 3 cifras
        //Hasta que llegue al 999 que es el ultimo numero de 3 cifras, voy aumentando de uno en uno
        //extraer digitos
        
        //echo "Numero:".$i."<br><br> División de sus dígitos:<br>";

        $cifraCentesima= floor($i/100);
        //echo "Centesima: ";
        //echo $cifraCentesima."<br>";

        //echo "Decima: ";
        $cifraDecima=floor(($i % 100) / 10);
        //echo $cifraDecima."<br>";

        //echo "Unidad: ";
        $cifraUnidad = $i % 10;
        //echo $cifraUnidad."<br><br>";
        

        //suma y multiplicacion de cifras
        $sumaCifras = $cifraCentesima + $cifraDecima + $cifraUnidad;
        $productoCifras = $cifraCentesima * $cifraDecima * $cifraUnidad;

        //verificacion la condición
        if ($sumaCifras == $productoCifras) {
            echo "Numero: $i (SumaCifras: $sumaCifras, ProductoCifras: $productoCifras)<br>";
        }
    }
    ?>
</body>

</html>