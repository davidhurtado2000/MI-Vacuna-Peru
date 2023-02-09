<?php
include_once '../model/ModelRepoPersonal.php';
class ControllerRepoPersonal
{
	public function ControllerListarVacunas($dni,$fecha){
		try{   
        	$obj=new ModelRepoPersonal();
        	return $obj->ModelListarVacunas($dni,$fecha);
     }catch(Exception $e){
         throw $e;
     }	
	}
}
?>