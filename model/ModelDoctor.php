<?php
include_once '../util/ConexionBD.php';

class ModelDoctor{

    public function __construct(){
        $con = new Conexion();
    }

    //Metodo de Modelador para Validar el Paciente en el LogIn
    public function _ModelValidarDoctor($usa,$pass){
        try{
            $obj = Conexion::singleton();
            $query = $obj->prepare('SELECT *
            FROM doctor
            INNER JOIN dni ON doctor.dni_dni_id = dni.dni_id
            INNER JOIN credenciales ON doctor.n_colegiado = credenciales.n_colegiado
            WHERE doctor.usuario=? AND doctor.contraseña=?');

            $query->bindParam(1, $usa);
            $query->bindParam(2, $pass);

            $query->execute();
            $vector = $query->fetchAll();
            $query = null;
            return $vector;
        } catch(Exception $e){
            throw $e;
        }
    }
    public function ModelVerificarDoctor1($dni,$nombres,$a_paterno,$a_materno,$f_emision,$f_nacimiento){
        try {
            $obj = Conexion::singleton();
            $query = $obj->prepare('SELECT dni_id, nombres, apellido_p, apellido_m, f_emision, f_nacimiento 
            FROM dni
            WHERE dni_id=?
            AND nombres=?
            AND apellido_p=?
            AND apellido_m=?
            AND f_emision=?
            AND f_nacimiento=?');
            $query->bindParam(1, $dni);
            $query->bindParam(2, $nombres);
            $query->bindParam(3, $a_paterno);
            $query->bindParam(4, $a_materno);
            $query->bindParam(5, $f_emision);
            $query->bindParam(6, $f_nacimiento);
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