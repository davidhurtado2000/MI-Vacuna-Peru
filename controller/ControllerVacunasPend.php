<?php
include_once '../model/ModelVacunasPend.php';
class ControllerVacunasPend
{
	public function ControllerListarVacunasPend($busqueda, $filtro){
		try{   
        	$obj=new ModelVacunasPend();
        	return $obj->ModelListarVacunasPend($busqueda, $filtro);
     }catch(Exception $e){
         throw $e;
     }	
	}


	}
?>