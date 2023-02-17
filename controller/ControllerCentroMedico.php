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
}
?>