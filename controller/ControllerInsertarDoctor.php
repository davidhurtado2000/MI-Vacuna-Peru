<?php
include_once 'ControllerDoctor.php';
$obj = new ControllerDoctor();

$dni = $_POST["dni"];
$credenciales = $_POST["credenciales"];
$usa = $_POST["usa"];
$pass = $_POST["pass"];
$lugar = $_POST["lugar"];

$status = $statusMsg = '';
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
            $obj->ControllerInsertarDoctor($dni, $lugar, $credenciales, $usa, $pass, $imgContent);
            header('Location:../controller/ControllerDestruirSesionRegistroDoctor.php');
            
            

            
        } else {
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
            header("Location:../view/RegistroDoctor.php?valor=1");
        }
    } else {
        $statusMsg = 'Please select an image file to upload.';
        header("Location:../view/RegistroDoctor.php?valor=");
    }

}
// Display status message 
?>
