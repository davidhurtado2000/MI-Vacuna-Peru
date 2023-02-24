<?php
include_once 'ControllerDoctor.php';
$obj = new ControllerDoctor();

function validatePassword($Password)
{
    if (preg_match("/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,50}$/", $Password) == 1) {
        return TRUE;
    } else {
        return FALSE;
    }
}

if ($_POST["dni"] == "" || $_POST["credenciales"] == "" || $_POST["usa"] == "" || $_POST["pass"] == "" || $_POST["lugar"] == "") {
    header("Location:../view/RegistroDoctor.php?valor=2");
} else {

    $dni = $_POST["dni"];
    $credenciales = $_POST["credenciales"];
    $usa = $_POST["usa"];
    $pass = $_POST["pass"];
    $lugar = $_POST["lugar"];

    if (validatePassword($pass)) {
        $extension = explode(".", $_FILES['fotosubida']['name']);
        $img = $dni . "." . $extension[1];
        echo $usa, $pass, $lugar, $img;

        $obj->ControllerInsertarDoctor($dni, $lugar, $credenciales, $usa, $pass, $img);
        $dir_carga = '../img/foto_perfiles/';
        $ruta_nombre_archivo_registrado = $dir_carga . $img;

        if (move_uploaded_file($_FILES['fotosubida']['tmp_name'], $ruta_nombre_archivo_registrado)) {
            echo "El fichero es válido y se subió con éxito.\n";
            header('Location:../controller/ControllerDestruirSesionRegistroDoctor.php');
        } else {
            echo "Error en la carga de archivos. \n";
        }

    } else {
        header("Location:../view/RegistroDoctor.php?valor=3");
    }
}

?>