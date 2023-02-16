<?php
include_once '../model/ModelVacunasPend.php';
class ControllerVacunasPend
{
	public function ControllerListarVacunasPend($idpaciente,$busqueda, $filtro){
		try{   
        	$obj=new ModelVacunasPend();
        	return $obj->ModelListarVacunasPend($idpaciente, $busqueda, $filtro);
     }catch(Exception $e){
         throw $e;
     }	
	}


	}
?>