<?php
session_start();
if ($_SESSION["dni"] == "" && $_SESSION["credenciales"] == "") {
  header('Location:../view/RegistroPaciente_Veri2.php?err=3');

} else {

  include_once "../controller/ControllerCentroMedico.php";
  $objHistorial = new ControllerCentroMedico();
  $listar = $objHistorial->ControllerMostrarCentroMedicos();

  ?>
  <!DOCTYPE html>
  <html lang="es">

  <head>
    <title>Mi Vacuna Peru</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/logindoctor.css" type="text/css" rel="stylesheet" media="">
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

    <div class="container	 my-3 border border-dark w-50" id="formulario">
      <div class="jumbotron text-center">
        <p class="h2">Registro de datos</p>
      </div>
      <div class="row">

        <form action="../controller/ControllerInsertarDoctor.php" method="post" enctype="multipart/form-data">
          <label for="id_centromedico">Selecciona el año:
            <select class="form form-control-sm" size="1" name="lugar" id="lugar">
              <option value="" selected>Escoge un centro medico: </option>
              <?php
              foreach ($listar as $fila) {
                echo "<option value='$fila[id_centromedico]'>" . $fila['nombre'] . "</option>";
              }
              ?>
            </select>
          </label>

          <div class="form-group border-bottom border-dark">
            <label for="correo_elec">Usuario</label>
            <img src="../img/email_icon.png" alt="Responsive image" id="iconos"><input type="text"
              class="form-control border-0" placeholder="Ingrese su Usuario" id="usa" name="usa" required>
          </div>

          <div class="form-group border-bottom border-dark">
            <label for="numero_tele">Contraseña</label>
            <img src="../img/phone_icon.png" alt="Responsive image" id="iconos"><input type="password"
              class="form-control border-0" placeholder="Ingresar su Contraseña" id="pass" name="pass" required>
          </div>

          <div class="form-group border-bottom border-dark">
            <label for="foto">Foto de Perfil</label>
            <input type="hidden" name="MAX_FILE_SIZE" value="30000000">
            <img src="../img/profile_icon.png" alt="Responsive image" id="iconos"><input type="file"
              class="form-control border-0" placeholder="Foto" name="fotosubida" required>

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
              <input type="hidden" name="dni" id="dni" value="<?php echo $_SESSION['dni'] ?>">
              <input type="hidden" name="credenciales" id="credenciales" value="<?php echo $_SESSION['credenciales'] ?>">
              <?php  echo $_SESSION['dni'] ?>
              <?php  echo $_SESSION['credenciales'] ?>
              <input type="submit" name="submit" class="btn btn-primary border border-dark" value="Ingresar">
            </div>
          </div>


        </form>

      </div>
    </div>

    

  </body>

  <footer class="mt-4  text-center">
    <p>© 2023 Copyright</p>
  </footer>


  </html>

  <?php
}
?>