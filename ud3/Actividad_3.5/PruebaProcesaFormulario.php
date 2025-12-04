<?php
if(isset($_POST['enviar'])){ //Aqui se procesa el formulario,  //aqui se pone $_GET tmb
    //una vez ya esta rellenado en la primera vez, la segunda se muestran los datos en este caso.
    echo "Datos del registro <br>";
    echo "------------------<br>";
    echo "Nombre: {$_POST['nombre']}<br>"; //Aqui tendria que cambiar a $_GET tmb si lo quiero probar
    echo "Email: {$_POST['email']}<br>";
    echo "Edad: {$_POST['edad']}<br>";
    echo "Pais: {$_POST['pais']}<br>";
    echo "Bio: {$_POST['bio']}<br>";
}else{ 
    echo "Sin datos en el formulario";//La primera vez como no lo tiene ejecutado, aparece el formulario a rellenar, 
    //porque con el isset () se comprueba que no hay valores
}
?>