<?php
$contador=0;
session_start();
echo "ID sesión: ", session_id(), "<br>";
echo "Nombre de la sesión: ", session_name(), "<br>";
if (isset($_SESSION['contador'])){
    $_SESSION['contador']++;
}else{
    $_SESSION['contador']=1;
}
echo "Te has conectado ",$_SESSION['contador']," veces<br>";
//Los convierto en arrays las sesiones con otro  []
$_SESSION['diavisitas'][]=date('d/m/Y'); //Me guarda el dia de la visita
$_SESSION['horavisitas'][]=date('H:i:s'); //Me guarda la hora de la visita

print_r($_SESSION['diavisitas']);
echo "<br>";
print_r($_SESSION['horavisitas']);

//Me conecto de nuevo a la sesión con el link
echo "<p><a href='./crear_sesion.php'>Haz click AQUI para refrescar la página</a></p>";

?>