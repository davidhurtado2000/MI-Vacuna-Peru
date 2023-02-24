<?php
include_once '../util/ConexionBD.php';

class ModelVacuna
{

    public function __construct()
    {
        $con = new Conexion();
    }

    public function RegistrarVacunaPendiente($fecha_estimada,$id_pendiente,$id_paciente,$dosispendiente,$id_centromedicom,$id_vacuna){
        try {

            $obj = Conexion::singleton();
            $query = $obj->prepare('INSERT INTO v_pend VALUES(?,?,?,?,?,?)');
            $query->bindParam(1, $fecha_estimada);
            $query->bindParam(2, $id_pendiente);
            $query->bindParam(3, $id_paciente);
            $query->bindParam(4, $dosispendiente);
            $query->bindParam(5, $id_centromedicom);
            $query->bindParam(6, $id_vacuna);

            $query->execute(); //Ejecuta la consulta SQL
        } catch (Exception $e) {
            throw $e;
        }

    }

    public function ModelMostrarVacunas(){
        try {
            $obj = Conexion::singleton();
            $query = $obj->prepare('SELECT id_tipovacuna, nombre_Vacuna
            FROM t_vacuna 
            ORDER BY nombre_Vacuna ASC');
            $query->execute();
            $vector = $query->fetchAll();
            $query = null;
            return $vector;
        } catch (Exception $e) {
            throw $e;
        }  
    }

    public function ModelMostrarEstadoPendiente(){
        try {
            $obj = Conexion::singleton();
            $query = $obj->prepare('SELECT id_pendiente, significado
            FROM pend 
            ORDER BY id_pendiente ASC');
            $query->execute();
            $vector = $query->fetchAll();
            $query = null;
            return $vector;
        } catch (Exception $th) {
            throw $th;
        }
    }

    public function ModelResgitrarVacunaNueva($id_tipovacuna,$fecha_vacunacion,$dosis,$id_paciente,$id_centromedico){
        try {
            
            $obj = Conexion::singleton();
            $query = $obj->prepare('INSERT INTO vacuna VALUES(?,?,?,?,?)');
            $query->bindParam(1, $id_tipovacuna);
            $query->bindParam(2, $fecha_vacunacion);
            $query->bindParam(3, $dosis);
            $query->bindParam(4, $id_paciente);
            $query->bindParam(5, $id_centromedico);
            $query->execute();

        } catch (Exception $e) {
            throw $e;
        }
    }

    public function ModificarVacuna(
        $t_vacuna_id_tipovacuna, $fecha_vacunacion, $dosis, $id_paciente, $id_centro,
        $t_vacuna_id_tipovacunaTMP, $fecha_vacunacionTMP, $dosisTMP, $id_pacienteTMP, $id_centroTMP)
    {
        try {
            $obj = Conexion::singleton();
            $query = $obj->prepare("UPDATE vacuna 
            SET t_vacuna_id_tipovacuna='" . $t_vacuna_id_tipovacuna . "', fecha_vacunacion='" . $fecha_vacunacion . "'
            , dosis='" . $dosis . "',  paciente_id_paciente='" . $id_paciente . "', id_centromedico='" . $id_centro . "' 

            WHERE t_vacuna_id_tipovacuna ='" .$t_vacuna_id_tipovacunaTMP."' 
            AND fecha_vacunacion ='" .$fecha_vacunacionTMP."' 
            AND dosis ='" .$dosisTMP."' 
            AND paciente_id_paciente ='" .$id_pacienteTMP."' 
            AND id_centromedico ='" .$id_centroTMP."'");

            echo $query->execute();

        } catch (Exception $e){
            throw $e;
        }

    }

    public function ModelObtenerIDVacuna($nombre_Vacuna){
        try {
            $obj = Conexion::singleton();
            $query = $obj->prepare('SELECT id_tipovacuna, nombre_Vacuna
            FROM t_vacuna 
            WHERE nombre_Vacuna=?');
            $query->bindParam(1,$nombre_Vacuna);
            $query->execute();
            $vector = $query->fetchAll();
            $query = null;
            return $vector;
        } catch (Exception $e) {
            throw $e;
        }  
    }

    public function EliminarVacuna($t_vacuna_id_tipovacuna, $fecha_vacunacion, $dosis, $id_paciente, $id_centro)
    {
        try {
            $obj = Conexion::singleton();
            $query = $obj->prepare("DELETE FROM vacuna 
            WHERE t_vacuna_id_tipovacuna ='" .$t_vacuna_id_tipovacuna."' 
            AND fecha_vacunacion ='" .$fecha_vacunacion."' 
            AND dosis ='" .$dosis."' 
            AND paciente_id_paciente ='" .$id_paciente."' 
            AND id_centromedico ='" .$id_centro."'");

            echo $query->execute();

        } catch (Exception $e){
            throw $e;
        }

    }

}
?>