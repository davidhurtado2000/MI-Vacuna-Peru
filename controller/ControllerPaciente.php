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

    public function ControllerVerificarPaciente1($dni,$nombres,$a_paterno,$a_materno,$f_emision,$f_nacimiento){
		try{   
        	$obj=new ModelPaciente();
        	return $obj->ModelVerificarPaciente1($dni,$nombres,$a_paterno,$a_materno,$f_emision,$f_nacimiento);
     }catch(Exception $e){
         throw $e;
     }	
	}

    public function ControllerInsertarPaciente($dni, $direccion, $correo, $numero, $foto){
        try {
            $obj=new ModelPaciente();
          $obj->ModelInsertarPaciente($dni, $direccion, $correo, $numero, $foto);
         header("Location:../view/RegistroPaciente.php?valor=1");
        } catch (Exception $e) {
            throw $e;
        }
    }
}
?>