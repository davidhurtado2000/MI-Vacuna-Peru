<?php
include_once '../model/ModelBuscarPaciente.php';
class ControllerBuscarPaciente
{
	public function ModelListarBuscarPaciente($busqueda){
		try{   
        	$obj=new ModelBuscarPaciente();
        	return $obj->ModelListarBuscarPaciente($busqueda);
     }catch(Exception $e){
         throw $e;
     }	
	}


	}
?>