<?php
include_once 'ControllerVacuna.php';
$obj = new ControllerVacuna();
if ($_POST['valor_dni'] == "" || $_POST['nombre_Vacuna'] == "" || $_POST['fecha_vacunacion'] == "" || $_POST['dosis'] == "" || $_POST['lugar'] == "") {
    echo "Error";
} else{

    $valor_dni = $_POST["valor_dni"];
    $nombre_Vacuna = $_POST["nombre_Vacuna"];
    $fecha_vacunacion = $_POST["fecha_vacunacion"];
    $dosis = $_POST["dosis"];
    $lugar = $_POST["lugar"];


    include "../controller/ControllerPaciente.php";
    $objPaciente = new ControllerPaciente();
    $listarDatosPaciente = $objPaciente->ControllerMostrarDatosPaciente2($valor_dni);

    include_once "../controller/ControllerCentroMedico.php";
    $objCentro = new ControllerCentroMedico();
    $listarIDCentro = $objCentro->ControlleObtenerIDCentroMedicos($lugar);

    include_once "../controller/ControllerVacuna.php";
    $objVacuna = new ControllerVacuna();
    $listarIDVacuna = $objVacuna->ControllerObtenerIDVacuna($nombre_Vacuna);

    foreach ($listarIDCentro as $filaIDCentro) {
        $id_centro = $filaIDCentro["id_centromedico"];
    }

    foreach ($listarIDVacuna as $filaIDVacuna) {
        $t_vacuna_id_tipovacuna = $filaIDVacuna["id_tipovacuna"];
    }

    foreach ($listarDatosPaciente as $filaIDPaciente) {
        $id_paciente = $filaIDPaciente["id_paciente"];
    }


    $obj->ControllerEliminarVacuna($t_vacuna_id_tipovacuna, $fecha_vacunacion, $dosis, $id_paciente, $id_centro);
    header("Location:../view/Buscar_Paciente.php?err=" . $error);

}


?>