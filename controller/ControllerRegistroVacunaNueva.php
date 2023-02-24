<?php
session_start();
include_once 'ControllerVacuna.php';
$obj = new ControllerVacuna();

if ($_POST["vacuna"] == "" || $_POST["vacunacion"] == "" || $_POST["dosis"] == "" || $_POST["lugar"] == "" || $_POST["id_paciente"] == "") {
    header("Location:../view/RegistroVacunaNueva.php?err=1");
} else {

    $id_tipovacuna = $_POST["vacuna"];
    $fecha_vacunacion = $_POST["vacunacion"];
    $dosis = $_POST["dosis"];
    $id_paciente = $_POST["id_paciente"];
    $id_centromedico = $_POST["lugar"];


    $obj->ControllerRegistrarVacunaNueva($id_tipovacuna,$fecha_vacunacion,$dosis,$id_paciente,$id_centromedico);
    header('Location:../view/Buscar_Paciente.php?success=1');
}
?>