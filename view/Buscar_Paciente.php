<?php
session_start();
if ($_SESSION["usuario"] == "" && $_SESSION["contraseña"]) {
    header('Location:../Log-in_Doctor.php?err=3');
} else {
    date_default_timezone_set('America/Lima');
    $fechaActual = date('d/m/y h:i');

    if (isset($_POST['busca_p'])) {
        $busqueda = $_POST["busca_p"];
    } else {
        $busqueda = "vacio";
    }

    include_once "../controller/ControllerBuscarPaciente.php";
    $objBuscarP = new ControllerBuscarPaciente();
    $listar = $objBuscarP->ModelListarBuscarPaciente($busqueda);


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
                            echo '<img src="data:image/png;base64,' . base64_encode($_SESSION['foto_perfil']) . '" 
                             style="width:50px; height:50px;" />';
                            echo "<label>" . $_SESSION['titulo'] . ": " . $_SESSION["nom_completo"] . "</label>";
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
                <!-- -----------------------------------------------------------------------------------------------------------  -->
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
                                <div class="row align-items-center mx-2 my-4 border border-3 border-dark ">
                                    <div class="row my-2">
                                        <!-- 
                                                <form action="Bucador_Vacuna.php" method="POST">
                                                    <input type="text" name="buscadr">
                                                    <input type="submit" value="buscar">

                                                </form>

                                                cambiar la busqueda
                                            -->

                                        <form action="Buscar_Paciente.php" method="POST">
                                            <div class="col-lg-6">
                                                <div class="input-group">
                                                    <input type="text" class="form-control rounded" id="busca_p"
                                                        name="busca_p" placeholder="Busqueda del Paciente" />
                                                    <input type="submit" class="btn btn-outline-primary"></input>
                                                </div>
                                            </div>
                                        </form>

                                    </div>

                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped border border-dark">
                                            <thead style="background: grey">
                                                <th scope="col">DNI</th>
                                                <th scope="col">Apellidos</th>
                                                <th scope="col">Nombres</th>
                                                <th scope="col">Historial</th>
                                            </thead>
                                            <?php

                                            foreach ($listar as $fila) {

                                                echo "<tr>";
                                                echo "<td>" . $fila["dni_dni_id"] . "</td>";
                                                echo "<td>" . $fila['apellido_p'] . " ," . $fila['apellido_m'] . "</td>";
                                                echo "<td>" . $fila["nombres"] . "</td>";
                                                echo "<td> ver historial </td>";
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