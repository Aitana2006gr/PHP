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

function mostrarPedidos($pedidos){
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>Numero</th><th>Método Pago</th><th>Fecha</th><th>Importe</th><tr>";
    foreach($pedidos as $pedido){
        echo "<tr>";
        echo "<td>".$pedido->getNumero()."</td>";
        echo "<td>".$pedido->getF_pago()."</td>";
        echo "<td>".$pedido->getFecha()."</td>";
        echo "<td>".$pedido->getImporte()."</td>";
        echo "</tr>";
    } 
}
?>