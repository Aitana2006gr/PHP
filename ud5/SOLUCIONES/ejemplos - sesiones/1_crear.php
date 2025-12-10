<?php
session_start();
#pedimos que escriba el identificador único y el nombre de la sesión
echo "ID sesión: ", session_id(),"<br>";
echo "Nombre sesión: ", session_name(),"<br>";
?>
