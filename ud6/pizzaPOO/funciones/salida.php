<?php
function mostrarPizzas($pizzas){
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>Código</th><th>Descripción</th><th>Tipo</th><th>Precio</th><tr>";
    foreach($pizzas as $pizza){
        echo "<tr>";
        echo "<td>".$pizza->getCodigo()."</td>";
        echo "<td>".$pizza->getDescripcion()."</td>";
        echo "<td>".$pizza->getTipo()."</td>";
        echo "<td>".$pizza->getPrecio()."</td>";
        echo "</tr>";
    }
}
?>