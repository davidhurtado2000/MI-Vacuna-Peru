<?php
session_start();

if ($_SESSION["dni"] == "" && $_SESSION["emision"] == "" && $_SESSION["nacimiento"] == "") {
    header('Location:../Log-in.php?err=3');
} else {
    date_default_timezone_set('America/Lima');
    $fechaActual = date('d/m/y h:i');

    include "../controller/ControllerPaciente.php";
    //Crear el objeto para el controlador
    $obj = new ControllerPaciente();
    $foto_perfil = $obj->ControllerMostrarFoto($_SESSION["dni"]);


    include_once"../controller/ControllerPaciente.php";
    //Crear el objeto para el controlador
    $objDatos = new ControllerPaciente();
    $listarDatos = $objDatos->ControllerMostrarDatosPaciente($_SESSION["dni"], $_SESSION["emision"], $_SESSION["nacimiento"]);


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
                            foreach ($listarDatos as $fila) {
                                echo "<div class='position-relative' style='width: 70px; height: 70px;'>";
                                echo "<img src='../img/foto_perfiles/$fila[paciente_foto]' style='height:70px; width:70px;'>";
                                echo "<div class='position-absolute bottom-0 end-0'style='width: 25px; height: 25px;'>";
                                echo "<a href='../view/ModificarFotoPerfil.php' style='text-decoration: none'>";
                                echo "<img src='../img/actualizar_foto.gif' class='' style='height:25px; width:25 px;'>";
                                echo "</a>";
                                echo "</div>";
                                echo "</div>";

                            }


                            echo "<label class='h7'>Paciente: " . $_SESSION["nom_completo"] . "</label>";
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

                                    <form action="../controller/ControllerModificarDatos.php" method="post">

                                    <?php foreach ($listarDatos as $filaDatos) { ?>

                                        <div class="row my-2">
                                            <div class="h4 text-center">Actualizacion de datos</div>
                                            <div class="col-md-2">
                                                <div class="col-md-12">Nombres: </div>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="text" name="nombres" value="<?php echo $filaDatos["nombres"]; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="row my-2">
                                            <div class="col-md-2">
                                                <div class="col-md-12 ">Apellido Paterno: </div>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="text" name="apellidos_p"
                                                    value="<?php echo $filaDatos["apellido_p"]; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="row my-2">
                                            <div class="col-md-2">
                                                <div class="col-md-12 ">Apellido Materno: </div>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="text" name="apellido_m"
                                                    value="<?php echo $filaDatos["apellido_m"]; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="row my-2">
                                            <div class="col-md-2">
                                                <div class="col-md-12 ">Fecha de Nacimiento: </div>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="text" name="f_nacimiento" value="<?php echo $filaDatos["f_nacimiento"]; ?>"
                                                    disabled>
                                            </div>
                                        </div>
                                        <div class="row my-2">
                                            <div class="col-md-2">
                                                <div class="col-md-12 ">Direccion: </div>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="text" name="direccion"
                                                    value="<?php echo $filaDatos["direccion"]; ?>" required>
                                            </div>
                                        </div>
                                        <div class="row my-2">
                                            <div class="col-md-2">
                                                <div class="col-md-12 ">Correo: </div>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="text" name="correo"
                                                    value="<?php echo $filaDatos["correo"]; ?>" required>
                                            </div>
                                        </div>
                                        <div class="row my-2">
                                            <div class="col-md-2">
                                                <div class="col-md-12 ">Telefono: </div>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="text" name="telefono"
                                                    value="<?php echo $filaDatos["telefono"]; ?>" required>
                                            </div>
                                        </div>

                                        <?php  ?>  

                                        <div class="container d-flex justify-content-center align-items-end">
                                            <div class="btn-group-vertical pt-2" style="background-color: white;">
                                            <input type="hidden" value="<?php echo $_SESSION['dni']?>" name="dni">
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
?>