<?php
include '../util/ConexionBD.php';

class ModelCentroMedico{
    public function __construct()
	{
		$con = new Conexion();
	}

    public function ModelMostrarCentroMedicos(){
        try {
            $obj = Conexion::singleton();
            $query = $obj->prepare('SELECT id_centromedico, nombre
            FROM c_medico 
            ORDER BY id_centromedico ASC');
            $query->execute();
            $vector = $query->fetchAll();
            $query = null;
            return $vector;
        } catch (Exception $e) {
            throw $e;
        }  
    }
}


?>