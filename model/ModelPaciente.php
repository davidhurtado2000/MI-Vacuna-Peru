<?php
use FTP\Connection;
include_once '../util/ConexionBD.php';

class ModelPaciente{

    public function _constructor(){
        $con = new Connection();
    }

    public function _ModelValidarPaciente($dni, $f_emision, $f_nacimiento){
        try{
            
        } catch(Exception $e){
            throw $e;
        }
    }
}
?>