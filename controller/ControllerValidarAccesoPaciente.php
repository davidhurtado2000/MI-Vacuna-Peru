<?php
session_start();
include 'ControllerPaciente.php';

function ageCalculator(String $bday) {
    $newDate = date("d-m-Y", strtotime($bday));  
    $bdayc = new DateTime($newDate);
    $today = new Datetime(date('d.m.y'));
    $diff = $today->diff($bdayc);
    $result = $diff->y;
    return $result;
    }     

$pro = new ControllerPaciente();
IF($_POST["dni"] == "" || $_POST["emision"] == "" || $_POST["nacimiento"] == ""){
    header('Location:../Log-in.php?err=1');
} else{
    $data = $pro->ControllerValidarPaciente($_POST["dni"], $_POST["emision"], $_POST["nacimiento"]);
    foreach($data as $fila){
        $_SESSION['dni'] = $fila['dni_id'];
        $_SESSION['emision'] = $fila['f_emision'];
        $_SESSION['nacimiento'] = $fila['f_nacimiento'];

        $_SESSION['nom_completo'] = $fila['nombres']. " , " .$fila['apellido_p']." ".$fila['apellido_m'];
        $_SESSION['ape_completo'] = $fila['apellido_p']." ".$fila['apellido_m'];
        $_SESSION['nombres'] = $fila['nombres'];
        $_SESSION['a_paterno'] = $fila['apellido_p'];
        $_SESSION['a_materno'] = $fila['apellido_m'];
        $_SESSION['edad'] = ageCalculator($fila['f_nacimiento']);
        $_SESSION['direccion'] = $fila['direccion'];
        $_SESSION['telefono'] = $fila['telefono'];
        $_SESSION['correo'] = $fila['correo'];


        


    }

    if(count($data) == 0)
	    header('Location:../Log-in.php?err=2');
	else {
	    header('Location:../view/Info_Ciudadano.php');
	}
}

/*
Codigo para hallar la edad
$bday = new DateTime('13.12.2000'); // Your date of birth
$today = new Datetime(date('d.m.y'));
$diff = $today->diff($bday);
printf(' Your age : %d years, %d month, %d days', $diff->y, $diff->m, $diff->d);
printf("\n");*/

?>