<?php
include_once '../model/ModelBuscarPaciente.php';
class ControllerBuscarPaciente
{
	public function ControllerListarBuscarPaciente($busqueda){
		try{   
        	$obj=new ModelBuscarPaciente();
        	return $obj->ModelListarBuscarPaciente($busqueda);
     }catch(Exception $e){
         throw $e;
     }	
	}


	}
?>