<?php
include_once 'ControllerDoctor.php';
$obj = new ControllerDoctor();

if(isset($_POST['submit'])){

    $dni = $_POST["dni"];
    $usuario = $_POST["usuario"];
    $contraseña = $_POST["contraseña"];
    $sede = $_POST["sede"];

    $obj->ControllerModificarDatosDoctor($dni, $usuario, $contraseña, $sede);
    header ("Location:../view/Info_Doctor.php?err=".$error); 

} else{
    echo "Error";
}

?>
