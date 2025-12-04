<?php
require_once('Círculo.php');

echo "<h2>Funcionamiento de la clase Círculo</h2>";
echo "Creo un objeto de la clase Circulo:<br>";
$circulo1 = new Circulo(73);
echo "<br>Valor del radio: ". $circulo1->radio;
/*
echo "<br><br>Uso el __get con un atributo correcto: ";
echo $circulo1->__get(73);
echo "<br>Uso el getRadio con un atributo incorrecto: ";
echo $circulo1->getRadio(80);
*/
echo "<br><br>Cambio el valor del radio a 15 con el método mágico:";
$circulo1->radio=15; //set magico 
echo "<br>Valor del radio: ". $circulo1->radio;
echo "<br>Cambio el valor del radio a 30 con el método normal:";
$circulo1->setRadio(30); //Metodo normal
echo "<br>Valor del radio: ". $circulo1->radio;





?>