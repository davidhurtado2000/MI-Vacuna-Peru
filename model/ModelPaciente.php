<?php
include_once '../util/ConexionBD.php';

class ModelPaciente
{

    public function __construct()
    {
        $con = new Conexion();
    }

    //Metodo de Modelador para Validar el Paciente en el LogIn
    public function _ModelValidarPaciente($dni, $f_emision, $f_nacimiento)
    {
        try {
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
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function MostrarDatosPaciente($dni, $f_emision, $f_nacimiento)
    {
        try {
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
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function MostrarDatosPaciente2($dni)
    {
        try {
            $obj = Conexion::singleton();
            $query = $obj->prepare('SELECT *
            FROM paciente
            INNER JOIN dni ON paciente.dni_dni_id = dni.dni_id WHERE dni.dni_id=?');

            $query->bindParam(1, $dni);

            $query->execute();
            $vector = $query->fetchAll();
            $query = null;
            return $vector;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function ModelVerificarPaciente1($dni, $nombres, $a_paterno, $a_materno, $f_emision, $f_nacimiento)
    {
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

    public function ModelInsertarPaciente($dni, $direccion, $correo, $numero, $foto)
    {
        try {

            $obj = Conexion::singleton();
            $query = $obj->prepare('SELECT id_paciente FROM paciente ORDER BY id_paciente DESC');
            $query->execute();
            $vector = $query->fetch();
            $query = null;
            echo substr(implode("", $vector), -6);
            $id = substr(implode("", $vector), -6);
            echo $id;
            $id++;

            $query = $obj->prepare('INSERT INTO paciente VALUES(?,?,?,?,?,?)');

            $query->bindParam(1, $id);
            $query->bindParam(2, $dni);
            $query->bindParam(3, $direccion);
            $query->bindParam(4, $correo);
            $query->bindParam(5, $numero);
            $query->bindParam(6, $foto);

            if ($query) {
                $status = 'success';
                $statusMsg = "File uploaded successfully.";
            } else {
                $statusMsg = "File upload failed, please try again.";
            }

            echo $statusMsg, $status;

            $query->execute(); //Ejecuta la consulta SQL
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function ModificarFoto($dni, $foto)
    {
        try {
            $obj = Conexion::singleton();
            $query = $obj->prepare("update paciente set paciente_foto='" . $foto . "' where dni_dni_id =" . $dni);
            echo $query->execute(); //Ejecuta la consulta SQL
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function MostrarFoto($dni)
    {
        try {
            $obj = Conexion::singleton();
            $query = $obj->prepare('select paciente_foto from paciente where dni_dni_id =?');

            $query->bindParam(1, $dni);
            $query->execute(); //Ejecuta la consulta SQL
            $vector = $query->fetchAll();
            $query = null;
            return $vector;
        } catch (Exception $e) {
            throw $e;
        }
    }


    public function ModificarDatos($dni, $direccion, $correo, $telefono)
    {
        try {
            $obj = Conexion::singleton();
            $query = $obj->prepare("UPDATE paciente SET direccion='" . $direccion . "', correo='" . $correo . "', telefono='" . $telefono . "' WHERE dni_dni_id ='" .$dni."'");
            echo $query->execute(); //Ejecuta la consulta SQL

        } catch (Exception $e) {
            throw $e;
        }
    }

    public function MostrarDatos($dni)
    {
        try {
            $obj = Conexion::singleton();
            $query = $obj->prepare('SELECT * FROM paciente 
            INNER JOIN dni
            ON paciente.dni_dni_id=dni.dni_id
            WHERE dni_dni_id=?');
            $query->bindParam(1, $dni);
            $query->execute(); //Ejecuta la consulta SQL
            $vector = $query->fetchAll();
            $query = null;
            return $vector;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
?>