<!DOCTYPE html>
<html lang="es">

<head>
  <title>Mi Vacuna Peru</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/logindoctor.css" type="text/css" rel="stylesheet" media="">
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
          <p class="h1">Mi Vacuna Peru <img src="img/peru.png" alt="Responsive image" id="logo_peru"></p>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="float-end">
          <img src="img/logo_minsa.png" class="img-fluid" alt="Responsive image" id="minsa">
        </div>
      </div>
    </div>
</header>

<body class="d-flex flex-column min-vh-100" style="background-color: transparent;">

  <!--div class="container-fluid	 mt-3 border border-dark w-25" id="formulario"-->
  <div class="container	 mt-3 border border-dark w-50 mb-3" id="formulario">
    <div class="jumbotron text-center">
      <p class="h2">Inicio de Sesion</p>
    </div>
    <div class="row">

      <form action="controller/ControllerValidarAccesoDoctor.php" method="post">
        <div class="form-group border-bottom border-dark">
          <label for="dni">Usuario</label>
          <img src="img/user.png" alt="Responsive image" id="iconos"><input type="text" class="form-control border-0"
            placeholder="Ingresar su Usuario" id="usa" name="usa">
        </div>

        <div class="form-group border-bottom border-dark">
          <label for="dni">Contraseña</label>
          <img src="img/pass.png" alt="Responsive image" id="iconos"><input type="password" class="form-control border-0"
            placeholder="Ingresar su Contraseña" id="pass" name="pass">
        </div>

        <br>

        <?php
        if (isset($_GET["err"])) {
          if ($_GET["err"] == 1) {
            echo "<label for='formGroupExampleInput2' style='color: red;'>Datos incompletos, ingrese sus datos.</label>";
          } elseif ($_GET["err"] == 2) {
            echo "<label for='formGroupExampleInput2' style='color: red;'>Datos incorrectos, intente nuevamente</label>";
          }
        }
        ?>

        <div class="container d-flex justify-content-center align-items-center">
          <div class="btn-group-vertical" style="background-color: white;">
            <input type="submit" class="btn btn-outline-primary" value="Ingresar">
          </div>
        </div>
      </form>

      <div class="container d-flex justify-content-center align-items-center">
        <div class="nonuser">
          <label for="nonuser">No tienes cuenta?</label>
          <a href="view/RegistroDoctor_Veri1.php">Registrate aqui</a>
        </div>
      </div>

      <div class="container d-flex justify-content-center align-items-center">
        <a type="button" href="Log-in.php" class="btn btn-outline-success my-3">Soy Paciente </a>
      </div>
    </div>

  </div>

  <script type="text/javascript" src="js/login.js"></script>
</body>

<footer class="mt-auto  text-center ">
  <p>© 2023 Copyright</p>
</footer>


</html>