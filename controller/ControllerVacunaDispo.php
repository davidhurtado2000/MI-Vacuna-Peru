<?php
include_once '../model/ModelVacunasDispo.php';
class ControllerVacunaDispo
{
	public function ControllerListarVacunasDispo($busqueda){
		try{   
        	$obj=new ModelVacunasDispo();
        	return $obj->ModelListarVacunasDispo($busqueda);
     }catch(Exception $e){
         throw $e;
     }	
	}


	}
?>