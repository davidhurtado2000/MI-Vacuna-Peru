<?php
include '../util/ConexionBD.php';

class ModelVacunasPend{
    public function __construct()
	{
		$con = new Conexion();
	}
     public function ModelListarVacunasPend($idpaciente, $busqueda, $filtro){
        if ($filtro == "Arriba"){
        try {
            $obj = Conexion::singleton();
            $query = $obj->prepare('SELECT t_vacuna.id_tipovacuna, t_vacuna.nombre_Vacuna, dosis_pendiente, f_estimadas, c_medico.nombre 
            FROM v_pend
            INNER JOIN t_vacuna
            ON v_pend.id_tipovacuna = t_vacuna.id_tipovacuna
            INNER JOIN c_medico
            ON v_pend.id_centromedico = c_medico.id_centromedico
            INNER JOIN pend
            ON v_pend.pend_id_pendiente = pend.id_pendiente
            INNER JOIN paciente
            ON v_pend.paciente_id_paciente = paciente.id_paciente
            WHERE pend.estado=1 AND paciente.dni_dni_id='.$idpaciente.' AND t_vacuna.nombre_Vacuna LIKE "%'.$busqueda.'%"
            ORDER BY f_estimadas ASC');
            $query->execute();
            $vector = $query->fetchAll();
            $query = null;
            return $vector;
        } catch (Exception $e) {
            throw $e;
        }    

        } elseif ($filtro == "Abajo"){
            try {
                $obj = Conexion::singleton();
                $query = $obj->prepare('SELECT t_vacuna.id_tipovacuna, t_vacuna.nombre_Vacuna, dosis_pendiente, f_estimadas, c_medico.nombre 
                FROM v_pend
                INNER JOIN t_vacuna
                ON v_pend.id_tipovacuna = t_vacuna.id_tipovacuna
                INNER JOIN c_medico
                ON v_pend.id_centromedico = c_medico.id_centromedico
                INNER JOIN pend
                ON v_pend.pend_id_pendiente = pend.id_pendiente
                INNER JOIN paciente
            ON v_pend.paciente_id_paciente = paciente.id_paciente
                WHERE pend.estado=1 AND paciente.dni_dni_id='.$idpaciente.' AND t_vacuna.nombre_Vacuna LIKE "%'.$busqueda.'%"
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
                $query = $obj->prepare('SELECT t_vacuna.id_tipovacuna, t_vacuna.nombre_Vacuna, dosis_pendiente, f_estimadas, c_medico.nombre 
                FROM v_pend
                INNER JOIN t_vacuna
                ON v_pend.id_tipovacuna = t_vacuna.id_tipovacuna
                INNER JOIN c_medico
                ON v_pend.id_centromedico = c_medico.id_centromedico
                INNER JOIN pend
                ON v_pend.pend_id_pendiente = pend.id_pendiente
                INNER JOIN paciente
            ON v_pend.paciente_id_paciente = paciente.id_paciente
                WHERE pend.estado=1 AND paciente.dni_dni_id='.$idpaciente.' AND t_vacuna.nombre_Vacuna LIKE "%'.$busqueda.'%"');
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