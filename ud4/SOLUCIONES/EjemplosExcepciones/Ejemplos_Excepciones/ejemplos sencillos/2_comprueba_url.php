<?php

$url= "www.mipagina.com";
//$url= "http://www.mipagina.com";

echo compruebaUrl($url);

function compruebaUrl($url)
{
    try{
        
        if(stristr($url,"http://") === false) throw new Exception("Url Incompleta");
         
        return $url;   
    }
	
    catch (Exception $e){   

        echo "Tuvimos una excepcion! <br>";
        echo  $e->getMessage();
		echo "<br>";
        echo "Línea: ".$e->getLine();
    }
}

?>