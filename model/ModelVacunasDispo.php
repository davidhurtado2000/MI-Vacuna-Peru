<?php
include '../util/ConexionBD.php';

class ModelVacunasDispo{
    public function __construct()
	{
		$con = new Conexion();
	}
     public function ModelListarVacunasDispo($busqueda){
        try {
            $obj = Conexion::singleton();
            $query = $obj->prepare('SELECT t_vacuna.nombre_Vacuna, c_medico.nombre, disponibilidad, c_medico.direccion, c_medico.reserva 
            FROM v_dispo
            INNER JOIN c_medico
            ON v_dispo.c_medico_id_centromedico = c_medico.id_centromedico
            INNER JOIN t_vacuna
            ON v_dispo.id_tipovacuna = t_vacuna.id_tipovacuna
            WHERE disponibilidad=1 AND t_vacuna.nombre_Vacuna LIKE "%'.$busqueda.'%"');
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