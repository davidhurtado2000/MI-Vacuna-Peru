<?php
session_start();
include 'ControllerPaciente.php';

$pro = new ControllerPaciente();
IF($_POST["dni"] == "" || $_POST["emision"] == "" || $_POST["nacimiento"] == ""){
    header('Location:../Log-in.php?err=1');
} else{
    $data = $pro->ControllerValidarPaciente($_POST["dni"], $_POST["emision"], $_POST["nacimiento"]);
    foreach($data as $fila){
        $_SESSION['dni'] = $fila['dni_id'];
        $_SESSION['emision'] = $fila['f_emision'];
        $_SESSION['nacimiento'] = $fila['f_nacimiento'];

        $_SESSION['nom_completo'] = $fila['']. " , " .$fila['apellido_p']." ".$fila['apellido_m'];
        $_SESSION['nombres'] = $fila['nombres'];
        $_SESSION['a_paterno'] = $fila['apellido_p'];
        $_SESSION['a_materno'] = $fila['apellido_m'];
        $_SESSION['edad'] = $fila['']; //Hallar edad
        $_SESSION['direccion'] = $fila['direccion'];


    }
}

?>