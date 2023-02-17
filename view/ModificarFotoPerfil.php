<?php
session_start();

if ($_SESSION["dni"] == "" && $_SESSION["emision"] == "" && $_SESSION["nacimiento"] == "") {
    header('Location:../Log-in.php?err=3');
} else {
    date_default_timezone_set('America/Lima');
    $fechaActual = date('d/m/y h:i');




    ?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <title>Mi Vacuna Peru</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../css/basehtml.css" type="text/css" rel="stylesheet" media="">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>


    <header>
        <div class="container-fluid" style="background-color: white;">
            <div class="row">
                <div class="col-lg-6">
                    <div class="float-start">
                        <p class="h1">Mi Vacuna Peru <img src="../img/peru.png" alt="Responsive image" id="logo_peru"></p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="float-end">
                        <img src="../img/logo_minsa.png" class="img-fluid" alt="Responsive image" id="minsa">
                    </div>
                </div>
            </div>
    </header>

    <body class="d-flex flex-column min-vh-100" style="background-color: transparent;">

        <div class="container-fluid my-3 px-4 py-4">
            <div class="container-fluid  border border-dark border-2 rounded-2 py-4" style="background-color: #ffe599;">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="float-start my-2">
                            <?php
                            echo "<img src='../img/foto_perfiles/$_SESSION[foto_perfil]' class='mx-2' style='height:40px; width:40px;'>";
                            echo "<a href='../view/ModificarFotoPerfil.php'>Cambiar foto    </a>";
                            echo "<label>" . $_SESSION["nom_completo"] . "</label>";
                            ?>
                            <a href="../controller/ControllerDestruirSesion.php">Cerrar Sesión</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="float-end my-3">
                            <?php echo "<label>Fecha y Hora Actual: " . $fechaActual . "</label>"; ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2">
                        <div class="btn-group-vertical " style="width: 100%; background-color:white;">
                            <a href="Info_Ciudadano.php" class="btn change-bgcolor border border-dark rounded-0 py-4">
                                <div type="button">
                                    <img src="../img/i_icon.png" alt="Responsive image" id="menu_logo" class="float-start">
                                    <p class="text-wrap">Informacion del Usuario</p>
                                </div>
                            </a>
                            <a href="Historial_Vacuna.php" class="btn change-bgcolor border border-dark rounded-0 py-4">
                                <div type="button">
                                    <img src="../img/historial_icon.png" alt="Responsive image" id="menu_logo"
                                        class="float-start">
                                    <p class="text-wrap">Historial de Vacunas</p>
                                </div>
                            </a>
                            <a href="Vacuna_Pend.php" class="btn change-bgcolor border border-dark rounded-0 py-4">
                                <div type="button">
                                    <img src="../img/pendiente_icon.png" alt="Responsive image" id="menu_logo"
                                        class="float-start">
                                    <p class="text-wrap">Vacunas Pendientes</p>

                                </div>
                            </a>
                            <a href="Buscar_Vacuna.php" class="btn change-bgcolor border border-dark rounded-0 py-4">
                                <div type="button">
                                    <img src="../img/buscador_icon.png" alt="Responsive image" id="menu_logo"
                                        class="float-start">
                                    <p class="text-wrap">Buscador de Vacunas</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="col-md-12 px-4 h-100 border border-dark rounded-0 overflow-auto"
                            style="background-color: white; max-height: 357px;">
                            <div class="container">
                                <div class="row align-items-center mx-2 my-4">

                                    <form action="../controller/ControllerModificarFoto.php" method="post"
                                        enctype="multipart/form-data">

                                        <div class="form-group border-bottom border-dark">
                                            <label for="foto">Foto de Perfil</label>
                                            <input type="hidden" name="MAX_FILE_SIZE" value="30000000">
                                            <img src="../img/profile_icon.png" alt="Responsive image" id="menu_logo"><input
                                                type="file" class="form-control border-0" placeholder="Foto"
                                                name="fotosubida" required>

                                        </div>
                                        <?php
                                        if (isset($_GET["valor"])) {
                                            if ($_GET["valor"] == 1) {
                                                echo "<label for=formGroupExampleInput2>Solamente se acepta JPG, JPEG, PNG, & GIF para subir.</label>";
                                            }
                                        }
                                        ?>


                                        <div class="container d-flex justify-content-center align-items-center">
                                            <div class="btn-group-vertical pt-2" style="background-color: white;">
                                            <input type="hidden" value="<?php echo $_SESSION['dni']?>" id="dni" name="dni">
                                            <?php echo $_SESSION['dni']?>
                                            <?php echo $_SESSION['foto_perfil']?>
                                                <input type="submit" name="submit"
                                                    class="btn btn-primary border border-dark" value="Actualizar foto">
                                            </div>
                                        </div>


                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        </div>




    </body>

    <footer class="mt-auto  text-center ">
        <p>© 2023 Copyright</p>
    </footer>

    </html>

    <?php
    /*   $foto = $_SESSION['foto']; 
    echo "<img src=../img/$_SESSION[foto] height=15 width=15>";*/
}
?>