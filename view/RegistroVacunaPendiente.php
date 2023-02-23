<?php
session_start();
if ($_SESSION["usuario"] == "" && $_SESSION["contraseña"] == "") {
    header('Location:../Log-in_Doctor.php?err=3');
} else {

    if (isset($_POST["redi_dni"])) {
        $valor_dni = $_POST["redi_dni"];
        date_default_timezone_set('America/Lima');
        $fechaActual = date('d/m/y h:i');


        include "../controller/ControllerDoctor.php";
        $objDatos = new ControllerDoctor();
        $listarDatos = $objDatos->ControllerMostrarDatosDoctor($_SESSION["dni"], $_SESSION["credenciales"]);


        include "../controller/ControllerPaciente.php";
        $objPaciente = new ControllerPaciente();
        $listarDatosPaciente = $objPaciente->ControllerMostrarDatosPaciente2($valor_dni);

        include_once "../controller/ControllerVacuna.php";
        $objVacuna = new ControllerVacuna();
        $listarVacunas = $objVacuna->ControllerMostrarVacuna();

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
                        <!-- ------------------------------------------------------------------------------------------------------------->

                        <div class="col-lg-10">
                            <div class="col-md-12 px-4 h-100 border border-dark rounded-0 overflow-auto"
                                style="background-color: white; max-height: 357px;">
                                <div class='container'>


                                    <?php foreach ($listarDatosPaciente as $filaDatosPaciente) { ?>

                                        <div class='row align-items-center mx-2 my-4 border border-3 border-dark'>
                                            <div class='row my-2'>
                                                <div class="col-md-6">
                                                    <div class="col-md-12">
                                                        <?php echo "<label>Apellidos: " . $filaDatosPaciente['apellido_p'] . " " . $filaDatosPaciente['apellido_m'] . "</label>"; ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="col-md-12" id="contenido_personal">
                                                        <?php echo "<label>Nombres: " . $filaDatosPaciente["nombres"] . "</label>"; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <?php echo "<label>Fecha de Nacimiento: " . $filaDatosPaciente["f_nacimiento"] . "</label>"; ?>
                                            </div>

                                            <form action="ControllerRegistroVacuna.php" method="post">
                                               
                                                <div class="form-group border-bottom border-dark">
                                                    <label for="fch_vacuna">Fecha de Vacunacion</label>
                                                    <img src="../img/fechaemision.png" alt="Responsive image" id="iconos"><input
                                                        type="date" class="form-control border-0" id="vacunacion" name="vacunacion"
                                                        required>
                                                </div>
                                                <div class="form-group border-bottom border-dark">
                                                    <label for="dosis">Dosis</label>
                                                    <img src="../img/phone_icon.png" alt="Responsive image" id="iconos"><input
                                                        type="text" class="form-control border-0"
                                                        placeholder="Ingresar su Numero Telefonico" min="1" id="dosis" name="dosis"
                                                        required>
                                                </div>
                                                <label for="id_tipovacuna">Selecciona Vacuna:
                                                    <select class="form form-control-sm" size="1" name="vacuna" id="vacuna">
                                                        <option value="" selected>Escoge una Vacuna: </option>
                                                        <?php
                                                        foreach ($listarVacunas as $filaVacuna) {
                                                            echo "<option value='$filaVacuna[id_tipovacuna]'>" . $filaVacuna['nombre_Vacuna'] . "</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </label>
                                                <input type="hidden" value="<?php echo $valor_dni ?>" name="valor_dni">
                                            </form>
                                        </div>

                                    <?php } ?>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            </div>

            <script>
                function myFunction() {
                    document.getElementById("myForm").submit();
                }
            </script>


        </body>
        <footer class="mt-auto  text-center">
            <p>© 2023 Copyright</p>
        </footer>

        </html>

        <?php
        /*   $foto = $_SESSION['foto']; 
        echo "<img src=../img/$_SESSION[foto] height=15 width=15>";*/
    } else {
        header('Location:../view/Buscar_Paciente.php?err=1');
    }
}

?>