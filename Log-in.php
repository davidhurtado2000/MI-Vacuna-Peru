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


<header class="container-fluid" id="navegador">
  <nav class="navbar navbar-light bg-light">
    <p class="h1">Mi Vacuna Peru <img src="img/peru.png" alt="Responsive image" id="logo_peru"></p>
    <img src="img/logo_minsa.png" class="img-fluid" alt="Responsive image" id="minsa">
  </nav>
</header>

<body style="background-color: transparent;">


  <div class="container-fluid	 border border-dark " id="formulario">
    <div class="jumbotron text-center">
      <h2>Ingresar sus datos para su verificacion</h2>
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
          <div class="button">
            <button type="submit" class="btn btn-primary" value="Submit">Ingresar</button>
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

<footer class="container-fluid text-center">
  <p>© 2023 Copyright</p>
</footer>


</html>