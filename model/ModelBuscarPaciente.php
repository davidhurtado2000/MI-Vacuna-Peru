<?php
include '../util/ConexionBD.php';

class ModelBuscarPaciente{
    public function __construct()
	{
		$con = new Conexion();
	}
     public function ModelListarBuscarPaciente($busqueda){
        try {
            $obj = Conexion::singleton();
            $query = $obj->prepare('SELECT paciente.dni_dni_id, dni.apellido_p, dni.apellido_m, dni.nombres
            FROM paciente
            INNER JOIN dni
            ON paciente.dni_dni_id = dni.dni_id
            WHERE dni_dni_id LIKE "%'.$busqueda.'%"');
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