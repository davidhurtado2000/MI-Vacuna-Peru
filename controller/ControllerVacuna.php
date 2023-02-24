<?php
include_once '../model/ModelVacuna.php';
class ControllerVacuna
{

    public function ControllerRegistrarVacunaPendiente($fecha_estimada, $id_pendiente, $id_paciente, $dosispendiente, $id_centromedicom, $id_vacuna)
    {
        try {
            $obj = new ModelVacuna();
            return $obj->RegistrarVacunaPendiente($fecha_estimada, $id_pendiente, $id_paciente, $dosispendiente, $id_centromedicom, $id_vacuna);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function ControllerMostrarVacuna()
    {
        try {
            $obj = new ModelVacuna();
            return $obj->ModelMostrarVacunas();
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function ControllerMostrarEstadoPendiente()
    {
        try {
            $obj = new ModelVacuna();
            return $obj->ModelMostrarEstadoPendiente();
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function ControllerRegistrarVacunaNueva($id_tipovacuna,$fecha_vacunacion,$dosis,$id_paciente,$id_centromedico){
        try {
            $obj = new ModelVacuna;
            return $obj->ModelResgitrarVacunaNueva($id_tipovacuna,$fecha_vacunacion,$dosis,$id_paciente,$id_centromedico);
        } catch (Exception $th) {
            throw $th;
        }
    }

    public function ControllerModificarVacuna( $t_vacuna_id_tipovacuna, $fecha_vacunacion, $dosis, $id_paciente, $id_centro,
    $t_vacuna_id_tipovacunaTMP, $fecha_vacunacionTMP, $dosisTMP, $id_pacienteTMP, $id_centroTMP)
    {
        try {
            $obj = new ModelVacuna();
            return $obj->ModificarVacuna( $t_vacuna_id_tipovacuna, $fecha_vacunacion, $dosis, $id_paciente, $id_centro,
            $t_vacuna_id_tipovacunaTMP, $fecha_vacunacionTMP, $dosisTMP, $id_pacienteTMP, $id_centroTMP);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function ControllerObtenerIDVacuna($nombre_Vacuna)
    {
        try {
            $obj = new ModelVacuna();
            return $obj->ModelObtenerIDVacuna($nombre_Vacuna);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function ControllerEliminarVacuna($t_vacuna_id_tipovacuna, $fecha_vacunacion, $dosis, $id_paciente, $id_centro)
    {
        try {
            $obj = new ModelVacuna();
            return $obj->EliminarVacuna($t_vacuna_id_tipovacuna, $fecha_vacunacion, $dosis, $id_paciente, $id_centro);
        } catch (Exception $e) {
            throw $e;
        }
    }

}
?>