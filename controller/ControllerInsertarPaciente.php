<?php
include_once 'ControllerPaciente.php';
$obj = new ControllerPaciente();

$dni = $_POST["dni"];
$direccion = $_POST["direccion"];
$correo = $_POST["correo"];
$numero = $_POST["numero"];

$extension = explode(".", $_FILES['fotosubida']['name']);
$img	=	$dni.".".$extension[1];
$obj->ControllerInsertarPaciente($dni, $direccion, $correo, $numero, $img);
$dir_carga = '../img/foto_perfiles/';
$ruta_nombre_archivo_registrado = $dir_carga . $img; 

if (move_uploaded_file($_FILES['fotosubida']['tmp_name'], $ruta_nombre_archivo_registrado)) {
    	echo "El fichero es válido y se subió con éxito.\n";
          header('Location:../controller/ControllerDestruirSesionRegistro.php');
} else {
      echo "Error en la carga de archivos. \n";
}


/*$status = $statusMsg = '';
if (isset($_POST["submit"])) {
    $status = 'error';
    if (!empty($_FILES["fotosubida"]["name"])) {
        // Get file info 
        $fileName = basename($_FILES["fotosubida"]["name"]);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

        // Allow certain file formats 
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($fileType, $allowTypes)) {
            $image = $_FILES['fotosubida']['tmp_name'];
            $imgContent = addslashes(file_get_contents($image));

            // Insert image content into database 
            $obj->ControllerInsertarPaciente($dni, $direccion, $correo, $numero, $imgContent);
            header('Location:../controller/ControllerDestruirSesionRegistro.php');
            
            

            
        } else {
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
            header("Location:../view/RegistroPaciente.php?valor=1");
        }
    } else {
        $statusMsg = 'Please select an image file to upload.';
        header("Location:../view/RegistroPaciente.php?valor=");
    }

}*/
// Display status message 
?>
