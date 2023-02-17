<?php
include_once 'ControllerPaciente.php';
$obj = new ControllerPaciente();

if(isset($_POST['submit'])){

$dni = $_POST["dni"];

$extension = explode(".", $_FILES['fotosubida']['name']);
$img	=	$dni.".".$extension[1];
$obj->ControladorModificarFoto($dni, $img);
$dir_carga = '../img/foto_perfiles/';
$ruta_nombre_archivo_registrado = $dir_carga . $img; 

if (move_uploaded_file($_FILES['fotosubida']['tmp_name'], $ruta_nombre_archivo_registrado)) {
    	echo "El fichero es válido y se subió con éxito.\n";
        header('Location:../view/Info_Ciudadano.php');
} else {
      echo "Error en la carga de archivos. \n";
}

} else{
    echo "Error";
}

?>
