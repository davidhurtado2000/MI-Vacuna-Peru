<?php
include_once '../model/ModelPaciente.php';
class ControllerPaciente{


    //Metodo de Controlador para Validar el Paciente en el LogIn
    public function ControllerValidarPaciente($dni,$f_emision,$f_nacimiento){
        try {
            $obj = new ModelPaciente();
            return $obj->_ModelValidarPaciente($dni, $f_emision, $f_nacimiento);
        } catch (Exception $e) {
            throw $e;
        }
    }
}
?>