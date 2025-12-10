<?php 

    function comprobar($num1,$num2){
		//Verifico si ambos valores ingresados son numéricos.
		if(is_numeric($num1) && is_numeric($num2)){
			echo "Son numeros";
		}else{
			//Lanza una excepción.
			throw new Exception("Error, los dos parametros tienen que ser numeros", 1492);
		}

    }
 
	try {
		//Ejecutamos la función con valores numéricos y no numéricos.
        //comprobar(3,1);
		comprobar(5,'d');

    } catch (Exception $e) {
        //Capturamos la excepción si existe.
        echo $e->getMessage();
		echo "<br>";
		echo $e->getCode();
    }

 ?>