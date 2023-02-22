<?php
include_once 'ControllerPaciente.php';
$obj = new ControllerPaciente();

if (isset($_POST['submit']) && !empty($_FILES["fotosubida"]["name"])) {
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
    $dni = $_POST["dni"];

    $extension = explode(".", $_FILES['fotosubida']['name']);
    $img = $dni . "." . $extension[1];
    $dir_carga = '../img/foto_perfiles/';
    $ruta_nombre_archivo_registrado = $dir_carga . $img;
    $tipoarchivo = pathinfo($ruta_nombre_archivo_registrado, PATHINFO_EXTENSION);

    if (in_array($tipoarchivo, $allowTypes)) {
        if (move_uploaded_file($_FILES['fotosubida']['tmp_name'], $ruta_nombre_archivo_registrado)) {
            $obj->ControladorModificarFoto($dni, $img);
            header('Location:../view/Info_Ciudadano.php');
        } else {
            echo "Error en la carga de archivos. \n";
        }
    } else {
        header('Location:../view/ModificarFotoPerfil.php?err=2');
    }

} else {
    header('Location:../view/ModificarFotoPerfil.php?err=1');
}

?>