<?php
include_once '../util/ConexionBD.php';

class ModelPaciente{

    public function __construct(){
        $con = new Conexion();
    }


    //Metodo de Modelador para Validar el Paciente en el LogIn
    public function _ModelValidarPaciente($dni, $f_emision, $f_nacimiento){
        try{
            $obj = Conexion::singleton();
            $query = $obj->prepare('SELECT *
            FROM paciente
            INNER JOIN dni ON paciente.dni_dni_id = dni.dni_id WHERE dni.dni_id=? AND dni.f_emision=? AND dni.f_nacimiento=?');

            $query->bindParam(1, $dni);
            $query->bindParam(2, $f_emision);
            $query->bindParam(3, $f_nacimiento);

            $query->execute();
            $vector = $query->fetchAll();
            $query = null;
            return $vector;
        } catch(Exception $e){
            throw $e;
        }
    }
}
?>