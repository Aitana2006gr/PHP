<?php 
 function sumar($numero1, $numero2){
    //Verifico si ambos valores ingresados son numéricos.
    if(is_numeric($numero1) and is_numeric($numero2)){
       return $numero1 + $numero2;
    }else{
       //Crea una excepción.
       throw new Exception('Los valores ingresados no son numéricos',35);
       return 0;
    }
 }
 try{
    //Ejecutamos la función con o sin números.
    //echo sumar(3, 5);
	echo sumar('f', 5);
 }catch(Exception $e){
    echo "Mensaje: ".$e->getMessage();
	echo "<br>";
	echo "Código: ".$e->getCode();// — Obtiene el código de Excepción	
	echo "<br>";
	echo "Fichero: ".$e->getFile();// — Obtiene el fichero en el que ocurrió la excepción
	echo "<br>";
	echo "Línea: ".$e->getLine();// — Obtiene la línea en donde ocurrió la excepción
	echo "<br>";
	print_r ($e->getTrace());// — Obtiene el seguimiento de la pila
	echo "<br>";
	echo "Traza de la pila: ".$e->getTraceAsString() ;// - Obtiene la traza de la pila en formato cadena de caracteres
 }
?>

