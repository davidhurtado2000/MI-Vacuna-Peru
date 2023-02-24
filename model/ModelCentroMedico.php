<?php
include_once '../util/ConexionBD.php';

class ModelCentroMedico
{
    public function __construct()
    {
        $con = new Conexion();
    }

    public function ModelMostrarCentroMedicos()
    {
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

    public function ModelMostrarIdCentroMedico($nombre)
    {
        try {
            $obj = Conexion::singleton();
            $query = $obj->prepare('SELECT c_medico.nombre as nombreClinica
            FROM doctor
            INNER JOIN c_medico ON doctor.c_medico_id_centromedico = c_medico.id_centromedico
            WHERE dni_dni_id=?');
            $query->bindParam(1, $nombre);
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