
<?php 

 function edad($numero){
    //Verifico si el número es mayor o igual a 18.
    if($numero>=18){
       return "matriculado!!!!!";
    }else{
       //Lanza una excepción.
       throw new Exception('Es menor de edad');
       return 0;
	}
 }

 try{
    //Ejecutamos la función con un número.
    echo edad(15);
 }catch(Exception $e){
	//Capturamos la excepción si existe.
    echo $e->getMessage();
 }
 
?>

