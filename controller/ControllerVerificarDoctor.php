<?php
session_start();
include 'ControllerDoctor.php';

$pro = new ControllerDoctor();
IF($_POST["dni"] == "" || $_POST["emision"] == "" || $_POST["nacimiento"] == ""|| $_POST["nombres"] == ""|| $_POST["a_paterno"] == ""|| $_POST["a_materno"] == ""){
    header('Location:../view/RegistroDoctor_Veri1.php?err=1');
} else{
    $data = $pro->ControllerVerificarDoctor1($_POST["dni"],$_POST["nombres"],$_POST["a_paterno"],$_POST["a_materno"], $_POST["emision"], $_POST["nacimiento"]);
    foreach($data as $fila){
        $_SESSION['dni'] = $fila['dni_id'];
        $_SESSION['emision'] = $fila['f_emision'];
        $_SESSION['nacimiento'] = $fila['f_nacimiento'];
        $_SESSION['nombres'] = $fila['nombres'];
        $_SESSION['a_paterno'] = $fila['apellido_p'];
        $_SESSION['a_materno'] = $fila['apellido_m'];
    }

    if(count($data) == 0)
	    header('Location:../view/RegistroDoctor_Veri1.php?err=2');
	else {
	    header('Location:../view/RegistroDoctor_Veri2.php');
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