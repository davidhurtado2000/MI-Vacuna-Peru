<?php
include '../util/ConexionBD.php';

class ModelRepoPersonal{
    public function __construct()
	{
		$con = new Conexion();
	}
     public function ModelListarVacunas($dni,$fecha){
        try {
            $obj = Conexion::singleton();
            $query = $obj->prepare('SELECT t_vacuna.nombre_Vacuna, vacuna.dosis, vacuna.fecha_vacunacion, t_vacuna.lote, c_medico.nombre
            FROM vacuna
            INNER JOIN t_vacuna
            ON vacuna.t_vacuna_id_tipovacuna = t_vacuna.id_tipovacuna
            INNER JOIN paciente
            ON vacuna.paciente_id_paciente = paciente.id_paciente
            INNER JOIN c_medico
            ON vacuna.id_centromedico = c_medico.id_centromedico
            WHERE paciente.dni_dni_id=? and YEAR(vacuna.fecha_vacunacion)=?');
            $query->bindParam(1, $dni);
            $query->bindParam(2, $fecha);
            $query->execute();
            $vector = $query->fetchAll();
            $query = null;
            return $vector;
        } catch (Exception $e) {
            throw $e;
        }    
    }

    public function ModelCantidadAños($dni){
        try {
            $obj = Conexion::singleton();
            $query = $obj->prepare('SELECT DISTINCT YEAR(vacuna.fecha_vacunacion) as Año
            FROM vacuna 
            INNER JOIN t_vacuna
            ON vacuna.t_vacuna_id_tipovacuna = t_vacuna.id_tipovacuna
            INNER JOIN paciente
            ON vacuna.paciente_id_paciente = paciente.id_paciente
            INNER JOIN c_medico
            ON vacuna.id_centromedico = c_medico.id_centromedico
            WHERE paciente.dni_dni_id=? ORDER BY Año DESC');
            $query->bindParam(1, $dni);
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