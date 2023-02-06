<!DOCTYPE html>
<html lang="es">

<head>
  <title>Mi Vacuna Peru</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/login.css" type="text/css" rel="stylesheet" media="">
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

  <div class="container-fluid	 mt-3 border border-dark w-25" id="formulario">
    <div class="jumbotron text-center">
      <p class="h2">Ingresar sus datos</p>
    </div>
    <div class="row">
      <form action="#">
        <div class="form-group border-bottom border-dark">
          <label for="dni">DNI</label>
          <img src="img/dni.png" alt="Responsive image" id="iconos"><input type="text" class="form-control border-0"
            placeholder="Ingresar su DNI" minlength="8" id="dni" name="dni" maxlength="8" required>
        </div>

        <div class="form-group border-bottom border-dark">
          <label for="fch-emision">Fecha de Emision</label>
          <img src="img/fechaemision.png" alt="Responsive image" id="iconos"><input type="date"
            class="form-control border-0" id="emision" required>
        </div>

        <div class="form-group border-bottom border-dark">
          <label for="fch-nacimiento">Fecha de Nacimiento</label>
          <img src="img/nacimiento.png" alt="Responsive image" id="iconos"> <input type="date"
            class="form-control border-0" id="nacimiento" required>
        </div>
        <br>

        <div class="container d-flex justify-content-center align-items-center">
          <div class="btn-group-vertical" style="background-color: white;">
            <div type="submit" class="btn btn-primary border border-dark" value="Submit">
              Ingresar
            </div>
          </div>
        </div>

        <div class="container d-flex justify-content-center align-items-center">
          <div class="nonuser">
            <label for="nonuser">No tienes cuenta?</label>
            <a href="#">Registrate aqui</a>
          </div>
        </div>

      </form>
    </div>
  </div>

  <script type="text/javascript" src="js/login.js"></script>
</body>

<footer class="mt-auto  text-center">
  <p>© 2023 Copyright</p>
</footer>


</html>