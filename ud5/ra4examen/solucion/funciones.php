<?php
    function dibujarHijos(){
        for ($hijos = 0; $hijos <= 5; $hijos++) {
            if(isset( $_SESSION['hijos']) &&  $_SESSION['hijos']==$hijos){
                echo "<input type='radio' name='hijos' value='$hijos' checked>$hijos";
            }else{
                echo "<input type='radio' name='hijos' value='$hijos' required>$hijos";
            }
            // if($i<5){echo $i;}else {echo ">=" . $i;} };
        }
        echo "+";
    }

    function dibujarExtras(){
        $arrayExtras=array("Noche"=>100,"Festivo"=>60,"Hora"=>35,"Peligro"=>120,"Otros"=>70);
        foreach ($arrayExtras as $key => $value) {
            if(isset( $_SESSION['extra']) && array_key_exists($key, $_SESSION['extra'])){
                echo "<input type='checkbox' checked name='extra[$key]' value='$value.'/>".$key;
            }
            else
                echo "<input type='checkbox' name='extra[$key]' value='".$value."'/>".$key;
        }
    }



//Miramos si la clave de departamento existe y sacamos su valor, si no existe será general
    function nombreDepartamento() {
        $dep = array("fer" => "ferreteria", "inf" => "informatica", "ext" => "exterior", "vent" => "ventas", "man" => "mantenimiento");
        if (array_key_exists($_SESSION['dto'], $dep)) {
            $departamento = $dep[$_SESSION['dto']];  // ----- nombre asociado al dto ------------
        } else {
            $departamento = "General";
        }
        return $departamento;
    }

//Sumamos el salario total del empleado
    function calcularSalario() {
        $sumaExtras = array_sum($_SESSION['extra']);
        $total = $_SESSION['sueldo'] + ($_SESSION['hijos'] * 10 + $sumaExtras);
        return $total;
    }

?>