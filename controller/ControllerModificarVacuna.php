<?php
include_once 'ControllerVacuna.php';
$obj = new ControllerVacuna();
if(isset($_POST['submit'])){

    $t_vacuna_id_tipovacuna = $_POST["vacuna"]; 
    $fecha_vacunacion = $_POST["vacunacion"]; 
    $dosis = $_POST["dosis"]; 
    $id_paciente = $_POST["id_paciente"]; 
    $id_centro = $_POST["lugar"]; 

    $t_vacuna_id_tipovacunaTMP = $_POST["t_vacuna_id_tipovacunaTMP"]; 
    $fecha_vacunacionTMP = $_POST["fecha_vacunacionTMP"];
    $dosisTMP = $_POST["dosisTMP"];
    $id_centroTMP = $_POST["id_centroTMP"];

    $obj->ControllerModificarVacuna($t_vacuna_id_tipovacuna, $fecha_vacunacion, $dosis, $id_paciente, $id_centro,
    $t_vacuna_id_tipovacunaTMP, $fecha_vacunacionTMP, $dosisTMP, $id_paciente, $id_centroTMP);
    header ("Location:../view/Buscar_Paciente.php?err=".$error); 

} else{
    echo "Error";
}


?>