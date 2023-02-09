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
            $query = $obj->prepare('SELECT vacuna.dosis, vacuna.nombre_Vacuna, vacuna.fecha_vacunacion, vacuna.lote, c_medico.nombre
            FROM r_perso 
            INNER JOIN paciente 
            ON r_perso.paciente_id_paciente = paciente.id_paciente
            INNER JOIN vacuna 
            ON r_perso.vacuna_id_vacuna = vacuna.id_vacuna
            INNER JOIN c_medico 
            ON r_perso.id_centromedico = c_medico.id_centromedico
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
}


?>