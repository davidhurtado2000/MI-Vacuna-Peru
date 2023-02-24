<?php
session_start();
if ($_SESSION["usuario"] == "" && $_SESSION["contraseña"] == "") {
    header('Location:../Log-in_Doctor.php?err=3');
} else {
    date_default_timezone_set('America/Lima');
    $fechaActual = date('d/m/y h:i');

    include "../controller/ControllerDoctor.php";
    $objDatos = new ControllerDoctor();
    $listarDatos = $objDatos->ControllerMostrarDatosDoctor($_SESSION["dni"], $_SESSION["credenciales"]);
    include_once "../controller/ControllerCentroMedico.php";
    $objCentro = new ControllerCentroMedico();
    $listarCentro = $objCentro->ControllerMostrarCentroMedicos();
    $mostarDatoCentro = $objCentro->ControllerMostrarIDMedico($_SESSION["dni"]);


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
                        <div class="float-start my-2">

                            <?php foreach ($listarDatos as $fila) { ?>
                                <div class='position-relative' style='width: 70px; height: 70px;'>
                                    <img src="../img/foto_perfiles/<?php echo $fila["foto_doctor"] ?>?img"
                                        style='height:70px; width:70px;'>
                                    <div class='position-absolute bottom-0 end-0' style='width: 25px; height: 25px;'>
                                        <a href='../view/ModificarFotoPerfilDoctor.php' style='text-decoration: none'>
                                            <img src='../img/actualizar_foto.gif' class='' style='height:25px; width:25 px;'>
                                        </a>
                                    </div>
                                </div>
                                <label class='h7'>Doctor:
                                    <?php echo $_SESSION["nom_completo"] ?>
                                </label>

                            <?php } ?>

                            <a href="../controller/ControllerDestruirSesionDoctor.php">Cerrar Sesión</a>


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
                            <a href="Info_Doctor.php" class="btn change-bgcolor border border-dark rounded-0 py-4">
                                <div type="button">
                                    <img src="../img/i_icon.png" alt="Responsive image" id="menu_logo" class="float-start">
                                    <p class="text-wrap">Informacion del Doctor</p>
                                </div>
                            </a>
                            <a href="Buscar_Paciente.php" class="btn change-bgcolor border border-dark rounded-0 py-4">
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

                                    <form action="../controller/ControllerModificarDatosDoctor.php" method="post">

                                        <?php foreach ($listarDatos as $filaDatos) { ?>

                                            <div class="row my-2">
                                                <div class="h4 text-center">Actualizacion de datos</div>
                                                <div class="col-md-2">
                                                    <div class="col-md-12">Usuario: </div>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="text" name="usuario" class="form-control-sm border-dark" 
                                                        value="<?php echo $filaDatos["usuario"]; ?>" required>
                                                </div>
                                            </div>
                                            <div class="row my-2">
                                                <div class="col-md-2">
                                                    <div class="col-md-12 ">Contraseña: </div>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="password" class="form-control-sm border-dark"
                                                        placeholder="Ingresar su Contraseña" id="contraseña" name="contraseña"
                                                        required>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                            <div class="col-md-2">
                                                    <div class="col-md-12 ">Centro Medico: </div>
                                                </div>

                                                <div class="col-sm-8">
                                                    <select class="form form-control-sm  border border-dark" size="1"
                                                        name="sede" id="sede" required>
                                                        <?php foreach ($mostarDatoCentro as $filaCentrotmp) { ?>
                                                        <option value="" selected><?php echo $filaCentrotmp['nombreClinica']; ?>   </option>
                                                        <?php  } ?>
                                                        <?php
                                                        foreach ($listarCentro as $filaCentro) {
                                                            echo "<option value='$filaCentro[id_centromedico]'>" . $filaCentro['nombre'] . "</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>


                                            <?php ?>

                                            <div class="container d-flex justify-content-center align-items-end">
                                                <div class="btn-group-vertical pt-2" style="background-color: white;">
                                                    <input type="hidden" value="<?php echo $_SESSION['dni'] ?>" name="dni">
                                                    <input type="submit" name="submit"
                                                        class="btn btn-primary border border-dark" value="Actualizar mis datos">
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
}
?>