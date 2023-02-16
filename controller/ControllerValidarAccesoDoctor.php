<?php
session_start();
include 'ControllerDoctor.php';

function ageCalculator(String $bday) {
    $newDate = date("d-m-Y", strtotime($bday));  
    $bdayc = new DateTime($newDate);
    $today = new Datetime(date('d.m.y'));
    $diff = $today->diff($bdayc);
    $result = $diff->y;
    return $result;
    }     

$pro = new ControllerDoctor();
IF($_POST["usa"] == "" || $_POST["pass"] == ""){
    header('Location:../Log-in_Doctor.php?err=1');
} else{
    $data = $pro->ControllerValidarDoctor($_POST["usa"], $_POST["pass"]);
    foreach($data as $fila){
        #Datos del Doctor
        $_SESSION['dni'] = $fila['dni_id'];
        $_SESSION['emision'] = $fila['f_emision'];
        $_SESSION['nacimiento'] = $fila['f_nacimiento'];
        $_SESSION['nom_completo'] = $fila['nombres']. " , " .$fila['apellido_p']." ".$fila['apellido_m'];
        $_SESSION['ape_completo'] = $fila['apellido_p']." ".$fila['apellido_m'];
        $_SESSION['nombres'] = $fila['nombres'];
        $_SESSION['a_paterno'] = $fila['apellido_p'];
        $_SESSION['a_materno'] = $fila['apellido_m'];
        $_SESSION['edad'] = ageCalculator($fila['f_nacimiento']);
        $_SESSION['foto_perfil'] = $fila['paciente_foto'];

        #Credenciales del doctor
        $_SESSION['credenciales'] = $fila['n_colegiado'];
        $_SESSION['titulo'] = $fila['titulo'];
        $_SESSION['grado'] = $fila['grado'];
        $_SESSION['universidad'] = $fila['universidad'];
        $_SESSION['especialidad'] = $fila['especialidad'];

        #Usuario y Contra
        $_SESSION['usuario'] = $fila['usuario'];
        $_SESSION['contraseña'] = $fila['contraseña'];

        


    }

    if(count($data) == 0)
	    header('Location:../Log-in_Doctor.php?err=2');
	else {
	    header('Location:../view/Info_Doctor.php');
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