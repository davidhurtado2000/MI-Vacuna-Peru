<?php
session_start();
if ($_SESSION["usuario"] == "" && $_SESSION["contraseña"]) {
    header('Location:../Log-in_Doctor.php?err=3');
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
        <link href="../css/basehtmldoctor.css" type="text/css" rel="stylesheet" media="">
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
                        <div class="float-start">
                            <?php 
                             echo '<img src="data:image/png;base64,'.base64_encode($_SESSION['foto_perfil']).'" 
                             style="width:50px; height:50px;" />';
                             echo "<label>".$_SESSION['titulo'].": ".$_SESSION["nom_completo"]. "</label>"; 
                             ?>
                            <a href="../controller/ControllerDestruirSesionDoctor.php">Cerrar Sesión</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="float-end">
                            <?php echo "<label>Fecha y Hora Actual: " . $fechaActual . "</label>"; ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2">
                        <div class="btn-group-vertical " style="width: 100%; background-color:white;">
                            <a href="Info_Doctor.php" class="btn change-bgcolor border border-dark rounded-0 py-4">
                                <div type="button">
                                    <img src="../img/i_icon.png" alt="Responsive image" id="menu_logo" class="float-start">
                                    <p class="text-wrap">Informacion del Doctor</p>
                                </div>
                            </a>
                            <a href="#" class="btn change-bgcolor border border-dark rounded-0 py-4">
                                <div type="button">
                                    <img src="../img/historial_icon.png" alt="Responsive image" id="menu_logo"
                                        class="float-start">
                                    <p class="text-wrap">Buscador del paciente</p>
                                </div>
                            </a>
                           
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="col-md-12 px-4 h-100 border border-dark rounded-0 overflow-auto"
                            style="background-color: white; max-height: 357px;">
                            <div class="container">
                                <div class="row align-items-center mx-2 my-4">
                                    <div class="row my-2">
                                        <div class="h4 text-center">Informacion del Doctor</div>
                                        <div class="col-md-2">
                                            <div class="col-md-12">Nombres: </div>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="col-md-12 border border-dark" id="contenido_personal"
                                                style="background-color: #dddddd;">
                                                <?php echo "<label>" . $_SESSION["nombres"] . "</label>"; ?>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col-md-2">
                                            <div class="col-md-12 ">Apellido Paterno: </div>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="col-md-12 border border-dark" id="contenido_personal"
                                                style="background-color: #dddddd;">
                                                <?php echo "<label>" . $_SESSION["a_paterno"] . "</label>"; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col-md-2">
                                            <div class="col-md-12 ">Apellido Materno: </div>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="col-md-12 border border-dark" id="contenido_personal"
                                                style="background-color: #dddddd;">
                                                <?php echo "<label>" . $_SESSION["a_materno"] . "</label>"; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col-md-2">
                                            <div class="col-md-12 ">Edad: </div>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="col-md-12 border border-dark" id="contenido_personal"
                                                style="background-color: #dddddd;">
                                                <?php echo "<label>" . $_SESSION["edad"] . "</label>"; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col-md-2">
                                            <div class="col-md-12 ">Titulo: </div>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="col-md-12 border border-dark" id="contenido_personal"
                                                style="background-color: #dddddd;">
                                                <?php echo "<label>" . $_SESSION["titulo"] . "</label>"; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col-md-2">
                                            <div class="col-md-12">Grado: </div>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="col-md-12 border border-dark" id="contenido_personal"
                                                style="background-color: #dddddd;">
                                                <?php echo "<label>" . $_SESSION["grado"] . "</label>"; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col-md-2">
                                            <div class="col-md-12 ">Especialidad: </div>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="col-md-12 border border-dark" id="contenido_personal"
                                                style="background-color: #dddddd;">
                                                <?php echo "<label>" . $_SESSION["especialidad"] . "</label>"; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col-md-2">
                                            <div class="col-md-12 ">Credenciales: </div>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="col-md-12 border border-dark" id="contenido_personal"
                                                style="background-color: #dddddd;">
                                                <?php echo "<label>" . $_SESSION["credenciales"] . "</label>"; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col-md-2">
                                            <div class="col-md-12 ">Universidad: </div>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="col-md-12 border border-dark" id="contenido_personal"
                                                style="background-color: #dddddd;">
                                                <?php echo "<label>" . $_SESSION["universidad"] . "</label>"; ?>
                                            </div>
                                        </div>
                                    </div>
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