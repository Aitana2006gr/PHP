<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="css/estilo.css"/>
    </head>
    <body>
        <?php
        session_start();
        $platos = ["hamburguesa"=>"5","pizza"=>"10","pechugapollo"=>"7.5","tartamanzana"=>"3.5","sushi"=>"10","lasaña"=>"7"];
        $_SESSION["platos"] = $platos;
            foreach($platos as $key=>$value){
                echo "<a href='importe.php?c=$key'>";
				echo "<img src='img/".$key.".jpg'/>";
				echo "</a>";
                echo " ";
            }
            $descuento = array_rand($platos);
            $_SESSION["descuento"] = $descuento;
             echo "<div><h2>Oferta del Día:</h2><img src='img/".$descuento.".jpg'/></div>"
        ?>
    </body>
</html>
