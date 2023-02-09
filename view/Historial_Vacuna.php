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

        <div class="container-fluid mt-3 px-4 py-4">
            <div class="container-fluid pb-4 " style="background-color: #ffe599;">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="float-start">
                            <?php echo "<label>Paciente: " . $_SESSION["nom_completo"] . "</label>"; ?>
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
                            <a href="Info_Ciudadano.php" class="btn change-bgcolor border border-dark rounded-0 py-4">
                                <div type="button">
                                    <img src="../img/i_icon.png" alt="Responsive image" id="menu_logo" class="float-start">
                                    <p class="text-wrap">Informacion del Usuario</p>
                                </div>
                            </a>

                            <div type="button" class="btn change-bgcolor border border-dark rounded-0 py-4"
                                href="Historial_Vacuna.php">
                                <img src="../img/historial_icon.png" alt="Responsive image" id="menu_logo"
                                    class="float-start">
                                <p class="text-wrap">Historial de Vacunas</p>
                            </div>
                            <div type="button" class="btn change-bgcolor border border-dark rounded-0 py-4">
                                <img src="../img/pendiente_icon.png" alt="Responsive image" id="menu_logo"
                                    class="float-start">
                                <p class="text-wrap">Vacunas Pendientes</p>

                            </div>
                            <div type="button" class="btn change-bgcolor border border-dark rounded-0 py-4">
                                <img src="../img/buscador_icon.png" alt="Responsive image" id="menu_logo"
                                    class="float-start">
                                <p class="text-wrap">Buscador de Vacunas</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="col-md-12 px-4 h-100 border border-dark rounded-0 overflow-auto"
                            style="background-color: white; max-height: 357px;">
                            <div class="container">
                                <div class="row align-items-center mx-2 my-4 border border-3 border-dark ">
                                    <form action="ViewListarHistoriales.php" method="post">

                                    </form>

                                    <div class="row my-2">
                                        <div class="col-md-6">
                                            <div class="col-md-12">
                                                <?php echo "<label>Apellidos: " . $_SESSION['ape_completo'] . "</label>"; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="col-md-12" id="contenido_personal">
                                                <?php echo "<label>Nombres: " . $_SESSION["nombres"] . "</label>"; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        Fecha de nacimiento:
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped border border-dark">
                                            <thead style="background: grey">
                                                <th scope="col"># de Dosis</th>
                                                <th scope="col">Vacuna</th>
                                                <th scope="col">Fecha</th>
                                                <th scope="col">Lote</th>
                                                <th scope="col">Centro</th>
                                            </thead>

                                            <tr>
                                                <td>Tercera</td>
                                                <td>COVID</td>
                                                <td>08/08/22</td>
                                                <td>ABC</td>
                                                <td>Ricardo Palma</td>
                                            </tr>


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