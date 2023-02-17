<?php
include_once 'ControllerPaciente.php';
$obj = new ControllerPaciente();

if(isset($_POST['submit'])){

    $dni = $_POST["dni"];
    $direccion = $_POST["direccion"];
    $correo = $_POST["correo"];
    $telefono = $_POST["telefono"];

    $obj->ControllerModificarDatos($dni,$direccion,$correo,$telefono);
    header ("Location:../view/Info_Ciudadano.php?err=".$error); 

} else{
    echo "Error";
}

?>
