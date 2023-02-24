<?php
session_start();
include_once 'ControllerVacuna.php';
$obj = new ControllerVacuna();

if ($_POST["vacunacion"] == "" || $_POST["estadoVacuna"] == "" || $_POST["dosis"] == "" || $_POST["vacuna"] == "" || $_POST["lugar"] == ""
    || $_POST["id_paciente"] == "") {
    header("Location:../view/RegistroVacunaPendiente.php?err=1");
} else {

    $fecha_estimada = $_POST["vacunacion"];
    $id_pendiente = $_POST["estadoVacuna"];
    $id_paciente = $_POST["id_paciente"];
    $dosispendiente = $_POST["dosis"];
    $id_centromedicom = $_POST["lugar"];
    $id_vacuna = $_POST["vacuna"];


    $obj->ControllerRegistrarVacunaPendiente($fecha_estimada, $id_pendiente, $id_paciente, $dosispendiente, $id_centromedicom, $id_vacuna);
    header('Location:../view/Buscar_Paciente.php?success=1');
}
?>