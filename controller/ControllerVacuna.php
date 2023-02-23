<?php
include_once '../model/ModelVacuna.php';
class ControllerVacuna{

      public function ControllerRegistrarVacuna($idvacuna,$fecha_vacu,$dosis,$idpaciente,$id_centromedico){
        try{   
              $obj=new ModelVacuna();
              return $obj->RegistrarVacuna($idvacuna,$fecha_vacu,$dosis,$idpaciente,$id_centromedico);
         }catch(Exception $e){
             throw $e;
         }  
      }

      public function ControllerMostrarVacuna(){
            try{   
                  $obj=new ModelVacuna();
                  return $obj->ModelMostrarVacunas();
             }catch(Exception $e){
                 throw $e;
             }  
          }
}
?>