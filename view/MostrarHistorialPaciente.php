<?php
session_start();
if ($_SESSION["usuario"] == "" && $_SESSION["contraseña"] == "") {
    header('Location:../Log-in_Doctor.php?err=3');
} else {

    if (isset($_POST["valor_dni"])) {
        $valor_dni = $_POST["valor_dni"];
        date_default_timezone_set('America/Lima');
        $fechaActual = date('d/m/y h:i');
        if (isset($_POST['año'])) {
            $año = $_POST["año"];
        } else {
            $año = date("Y");
        }

        include_once "../controller/ControllerRepoPersonal.php";
        $objHistorial = new ControllerRepoPersonal();
        $listar = $objHistorial->ControllerListarVacunas($valor_dni, $año);
        $cantidad_años = $objHistorial->ControllerCantidadAños($valor_dni);
        include "../controller/ControllerDoctor.php";
        $objDatos = new ControllerDoctor();
        $listarDatos = $objDatos->ControllerMostrarDatosDoctor($_SESSION["dni"], $_SESSION["credenciales"]);


        include "../controller/ControllerPaciente.php";
        $objPaciente = new ControllerPaciente();
        $listarDatosPaciente = $objPaciente->ControllerMostrarDatosPaciente2($valor_dni);

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

                                    <div class="container text-end my-2">
                                        <form action="MostrarHistorialPaciente.php" id=myForm method=POST>
                                            <input type="hidden" value="<?php echo $valor_dni ?>" name="valor_dni"
                                                id="valor_dni">
                                            <label for="años">Selecciona el año:
                                                <select class="form form-control-sm" size="1" name="año" id="año"
                                                    onChange="myFunction();">
                                                    <option value="" selected>Escoge un año: </option>
                                                    <?php
                                                    foreach ($cantidad_años as $filaaños) {
                                                        echo "<option value='$filaaños[Año]'>" . $filaaños['Año'] . "</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </label>

                                        </form>
                                        <div class='col-12 h2 text-center'>
                                            <?php echo "<label>Reporte del año " . $año . "</label>"; ?>
                                        </div>
                                    </div>

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

                                            <?php if (empty($listar)) { ?>
                                                <div class='h2 text-center'>El paciente no tiene vacunas registradas este año
                                                </div>
                                            <?php } else { ?>
                                                <div class='table-responsive'>
                                                    <table class='table table-bordered table-striped border border-dark'>
                                                        <thead style='background: grey'>
                                                            <th scope='col'>Vacuna</th>
                                                            <th scope='col'># de Dosis</th>
                                                            <th scope='col'>Fecha</th>
                                                            <th scope='col'>Lote</th>
                                                            <th scope='col'>Centro</th>
                                                            <th scope='col'>Modificar Vacuna</th>
                                                            <th scope='col'>Eliminar Vacuna</th>
                                                        </thead>



                                                        </form>
                                                        <?php
                                                        foreach ($listar as $fila) {

                                                            echo "<tr>";
                                                            echo "<td>" . $fila["nombre_Vacuna"] . "</td>";
                                                            echo "<td>" . $fila["dosis"] . "</td>";
                                                            echo "<td>" . $fila["fecha_vacunacion"] . "</td>";
                                                            echo "<td>" . $fila["lote"] . "</td>";
                                                            echo "<td>" . $fila["nombre"] . "</td>";
                                                            echo "<td> 
                                                            <form action='Modificar_Vacuna.php' method='post'>
                                                            <input type='hidden' value='" . $valor_dni . "' name='valor_dni'>
                                                            <input type='hidden' value='" . $fila["nombre_Vacuna"] . "' name='nombre_Vacuna'>
                                                            <input type='hidden' value='" . $fila["dosis"] . "' name='dosis'>
                                                            <input type='hidden' value='" . $fila["fecha_vacunacion"] . "' name='fecha_vacunacion'>
                                                            <input type='hidden' value='" . $fila["lote"] . "' name='lote'>
                                                            <input type='hidden' value='" . $fila["nombre"] . "' name='nombre'>
                                                            <input type='submit' value='Modificar Vacuna'> 
                                                            </td>";
                                                            echo "</form>";

                                                            echo "<td> 
                                                            <form action='../controller/ControllerEliminarVacuna.php' id='eliminarvacuna' method='post'>
                                                            <input type='hidden' value='" . $valor_dni . "' name='valor_dni'>
                                                            <input type='hidden' value='" . $fila["nombre_Vacuna"] . "' name='nombre_Vacuna'>
                                                            <input type='hidden' value='" . $fila["dosis"] . "' name='dosis'>
                                                            <input type='hidden' value='" . $fila["fecha_vacunacion"] . "' name='fecha_vacunacion'>
                                                            <input type='hidden' value='" . $fila["nombre"] . "' name='lugar'>
                                                            <input type='button' value='Eliminar Vacuna' onClick='popMessage()'> 
                                                            </td>";
                                                            echo "</form>";
                                                            echo "</tr>";
                                                        }
                                                        ?>
                                                    </table>
                                                </div>



                                            <?php } ?>

                                            <div class="col-lg-12 my-3">
                                                <div class="row ">
                                                    <div class="col-md-6">
                                                        <div class="h-100 d-flex align-items-center justify-content-center">
                                                            <form action="RegistroVacunaNueva.php" method="post">
                                                                <input type="hidden" id="valor_dni" name="valor_dni"
                                                                    value="<?php echo $valor_dni; ?>">
                                                                <input type="submit" class="btn btn-success"
                                                                    value="Registrar Nueva Vacuna">
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="h-100 d-flex align-items-center justify-content-center">
                                                            <form action="RegistroVacunaPendiente.php" method="post">
                                                                <input type="hidden" id="valor_dni" name="valor_dni"
                                                                    value="<?php echo $valor_dni; ?>">
                                                                <input type="submit" class="btn btn-warning"
                                                                    value="Registrar Vacuna Pendiente">
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


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
                function myFunction(){
                    document.getElementById("myForm").submit();
                }

                function popMessage() {
                    if (confirm("Estas seguro que deseas eliminar esta vacuna del historial?")) {
                        document.getElementById("eliminarvacuna").submit();
                    }
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