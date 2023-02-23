<?php
include_once '../util/ConexionBD.php';

class ModelVacuna
{

    public function __construct()
    {
        $con = new Conexion();
    }

    public function RegistrarVacuna($idvacuna,$fecha_vacu,$dosis,$idpaciente,$id_centromedico){
        try {

            $obj = Conexion::singleton();
            $query = $obj->prepare('INSERT INTO vacuna VALUES(?,?,?,?,?)');
            $query->bindParam(1, $idvacuna);
            $query->bindParam(2, $fecha_vacu);
            $query->bindParam(3, $dosis);
            $query->bindParam(4, $idpaciente);
            $query->bindParam(5, $id_centromedico);

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
            ORDER BY id_tipovacuna ASC');
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