<?php
session_start();
if ($_SESSION["dni"] == "" && $_SESSION["emision"] == "" && $_SESSION["nacimiento"] == "") {
    header('Location:../Log-in.php?err=3');
} else {
    $timestamp = microtime();
    date_default_timezone_set('America/Lima');
    $fechaActual = date('d/m/y h:i');

    if (isset($_POST['busca'])) {
        $busqueda = $_POST["busca"];
    } else {
        $busqueda = "vacio";
    }

    include_once "../controller/ControllerVacunaDispo.php";
    $objVacunaDispo = new ControllerVacunaDispo();
    $listar = $objVacunaDispo->ControllerListarVacunasDispo($busqueda);

    include "../controller/ControllerPaciente.php";
    //Crear el objeto para el controlador
    $obj = new ControllerPaciente();
    $listarDatos = $obj->ControllerMostrarDatosPaciente($_SESSION["dni"], $_SESSION["emision"], $_SESSION["nacimiento"]);

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
                            <?php foreach ($listarDatos as $fila) { ?>
                                <div class='position-relative' style='width: 70px; height: 70px;'>
                                    <img src='../img/foto_perfiles/<?php echo $fila["paciente_foto"]?>?time=<?php echo $timestamp ?> '
                                        style='height:70px; width:70px;'>
                                    <div class='position-absolute bottom-0 end-0' style='width: 25px; height: 25px;'>
                                        <a href='../view/ModificarFotoPerfil.php' style='text-decoration: none'>
                                            <img src='../img/actualizar_foto.gif' class='' style='height:25px; width:25 px;'>
                                        </a>
                                    </div>
                                </div>
                                <label class='h7'>Paciente:
                                    <?php echo $_SESSION["nom_completo"] ?>
                                </label>

                            <?php } ?>
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
                                <div class="row align-items-center mx-2 my-4 border border-3 border-dark ">
                                    <div class="row my-2">
                                        <!-- 
                                                <form action="Bucador_Vacuna.php" method="POST">
                                                    <input type="text" name="buscadr">
                                                    <input type="submit" value="buscar">

                                                </form>

                                                cambiar la busqueda
                                            -->

                                        <form action="Buscar_Vacuna.php" method="POST">
                                            <div class="col-lg-6">
                                                <div class="input-group">
                                                    <input type="text" class="form-control rounded" id="busca" name="busca"
                                                        placeholder="Busqueda" />
                                                    <input type="submit" class="btn btn-outline-primary"></input>
                                                </div>
                                            </div>
                                        </form>

                                    </div>

                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped border border-dark">
                                            <thead style="background: grey">
                                                <th scope="col">Vacuna</th>
                                                <th scope="col">Centro Medico</th>
                                                <th scope="col">Disponibilidad</th>
                                                <th scope="col">Direccion</th>
                                                <th scope="col">Reservas</th>
                                            </thead>
                                            <a href=""></a>
                                            <?php

                                            foreach ($listar as $fila) {
                                                if ($fila["disponibilidad"] == 1) {
                                                    $dispo = "Si";
                                                }
                                                echo "<tr>";
                                                echo "<td>" . $fila["nombre_Vacuna"] . "</td>";
                                                echo "<td>" . $fila["nombre"] . "</td>";
                                                echo "<td>" . $dispo . "</td>";
                                                echo "<td>" . $fila["direccion"] . "</td>";
                                                echo "<td>" . "<a href=" . $fila["reserva"] . " target=”_blank”>" . $fila["reserva"] . "</a>" . "</td>";
                                                echo "</tr>";
                                            }

                                            ?>


                                        </table>
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

    <footer class="mt-auto  text-center">
        <p>© 2023 Copyright</p>
    </footer>

    </html>

    <?php
    /*   $foto = $_SESSION['foto']; 
    echo "<img src=../img/$_SESSION[foto] height=15 width=15>";*/
}
?>