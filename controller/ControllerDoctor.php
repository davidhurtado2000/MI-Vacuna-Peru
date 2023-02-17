<?php
include_once '../model/ModelDoctor.php';
class ControllerDoctor{


    //Metodo de Controlador para Validar el Paciente en el LogIn
    public function ControllerValidarDoctor($usa,$pass){
        try {
            $obj = new ModelDoctor();
            return $obj->_ModelValidarDoctor($usa,$pass);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function ControllerVerificarDoctor1($dni,$nombres,$a_paterno,$a_materno,$f_emision,$f_nacimiento){
		try{   
        	$obj=new ModelDoctor();
        	return $obj->ModelVerificarDoctor1($dni,$nombres,$a_paterno,$a_materno,$f_emision,$f_nacimiento);
     }catch(Exception $e){
         throw $e;
     }	
	}

    public function ControllerVerificarDoctor2($credenciales){
		try{   
        	$obj=new ModelDoctor();
        	return $obj->ModelVerificarDoctor2($credenciales);
     }catch(Exception $e){
         throw $e;
     }	
	}

    public function ControllerInsertarDoctor($dni, $lugar, $credenciales, $usa, $pass, $foto){
        try {
            $obj=new ModelDoctor();
          $obj->ModelInsertarDoctor($dni, $lugar, $credenciales, $usa, $pass, $foto);
         header("Location:../view/RegistroDoctor.php?valor=1");
        } catch (Exception $e) {
            throw $e;
        }
    }

   
}
?>