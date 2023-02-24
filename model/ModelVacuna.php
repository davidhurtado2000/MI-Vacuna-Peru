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
}
?>