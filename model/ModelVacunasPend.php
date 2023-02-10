<?php
include '../util/ConexionBD.php';

class ModelVacunasPend{
    public function __construct()
	{
		$con = new Conexion();
	}
     public function ModelListarVacunasPend($busqueda, $filtro){
        if ($filtro == "Arriba"){
        try {
            $obj = Conexion::singleton();
            $query = $obj->prepare('SELECT vacuna.id_vacuna, vacuna.nombre_Vacuna, dosis_pendiente, f_estimadas, c_medico.nombre 
            FROM v_pend
            INNER JOIN vacuna
            ON v_pend.vacuna_id_vacuna = vacuna.id_vacuna
            INNER JOIN c_medico
            ON v_pend.id_centromedico = c_medico.id_centromedico
            INNER JOIN pend
            ON v_pend.pend_id_pendiente = pend.id_pendiente
            WHERE pend.estado=1 AND vacuna.nombre_Vacuna LIKE "%'.$busqueda.'%"
            ORDER BY f_estimadas ASC');
            $query->execute();
            $vector = $query->fetchAll();
            $query = null;
            return $vector;
        } catch (Exception $e) {
            throw $e;
        }    

        } elseif ($filtro == "Arriba"){
            try {
                $obj = Conexion::singleton();
                $query = $obj->prepare('SELECT vacuna.id_vacuna, vacuna.nombre_Vacuna, dosis_pendiente, f_estimadas, c_medico.nombre 
                FROM v_pend
                INNER JOIN vacuna
                ON v_pend.vacuna_id_vacuna = vacuna.id_vacuna
                INNER JOIN c_medico
                ON v_pend.id_centromedico = c_medico.id_centromedico
                INNER JOIN pend
                ON v_pend.pend_id_pendiente = pend.id_pendiente
                WHERE pend.estado=1 AND vacuna.nombre_Vacuna LIKE "%'.$busqueda.'%"
                ORDER BY f_estimadas DESC');
                $query->execute();
                $vector = $query->fetchAll();
                $query = null;
                return $vector;
            } catch (Exception $e) {
                throw $e;
            }   
        } else{
            try {
                $obj = Conexion::singleton();
                $query = $obj->prepare('SELECT vacuna.id_vacuna, vacuna.nombre_Vacuna, dosis_pendiente, f_estimadas, c_medico.nombre 
                FROM v_pend
                INNER JOIN vacuna
                ON v_pend.vacuna_id_vacuna = vacuna.id_vacuna
                INNER JOIN c_medico
                ON v_pend.id_centromedico = c_medico.id_centromedico
                INNER JOIN pend
                ON v_pend.pend_id_pendiente = pend.id_pendiente
                WHERE pend.estado=1 AND vacuna.nombre_Vacuna LIKE "%'.$busqueda.'%"');
                $query->execute();
                $vector = $query->fetchAll();
                $query = null;
                return $vector;
            } catch (Exception $e) {
                throw $e;
            }   
        }

    }

   
}


?>