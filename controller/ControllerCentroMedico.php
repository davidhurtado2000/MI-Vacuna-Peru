<?php
include_once '../model/ModelCentroMedico.php';
class ControllerCentroMedico
{
    public function ControllerMostrarCentroMedicos(){
		try{   
        	$obj=new ModelCentroMedico();
        	return $obj->ModelMostrarCentroMedicos();
     }catch(Exception $e){
         throw $e;
     }	
	}

    public function ControlleObtenerIDCentroMedicos($nombre){
		try{   
        	$obj=new ModelCentroMedico();
        	return $obj->ModelObtenerIDrCentroMedicos($nombre);
     }catch(Exception $e){
         throw $e;
     }	
	}
}
?>