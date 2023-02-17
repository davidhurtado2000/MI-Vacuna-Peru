<?php
session_start();
include 'ControllerDoctor.php';

$pro = new ControllerDoctor();
IF($_POST["dni"] == "" || $_POST["credenciales"] == ""){
    header('Location:../view/RegistroDoctor_Veri2.php?err=1');
} else{
    $data = $pro->ControllerVerificarDoctor2($_POST["credenciales"]);
    foreach($data as $fila){
        $_SESSION['credenciales'] = $fila['n_colegiado'];
    }
        $_SESSION['dni'] = $_POST['dni'];

    if(count($data) == 0)
	    header('Location:../view/RegistroDoctor_Veri2.php?err=2');
	else {
	    header('Location:../view/RegistroDoctor.php');
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