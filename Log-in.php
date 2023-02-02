<!DOCTYPE html>
<html lang="es">

<head>
  <title>Mi Vacuna Peru</title>
  <meta charset="utf-8">
  <link href="css/login.css" type="text/css" rel="stylesheet" media="">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  
</head>

<body style="padding-top: 15%;">
  <div class="container" style="width: 30%;">
    <div class="row">
      <form action="#">
        <div class="form-group">
          <label for="dni">DNI</label>
          <input type="text" class="form-control" placeholder="Ingresar su DNI" minlength="8" id="dni" name="dni"
            maxlength="8" required>
        </div>

        <div class="form-group">
          <label for="fch-emision">Fecha de Emision</label>
          <input type="date" class="form-control" id="emision" required>
        </div>

        <div class="form-group">
          <label for="fch-nacimiento">Fecha de Nacimiento</label>
          <input type="date" class="form-control" id="nacimiento" required>
        </div>
        <br>
        <button type="submit" class="btn btn-primary" value="Submit">Ingresar</button>
        <label for="no-cuenta">No tienes cuenta?</label>
        <a href="#">Registrate aqui</a>

      </form>
    </div>
  </div>

  <script type="text/javascript" src="js/login.js"></script>
</body>

</html>