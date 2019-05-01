<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta charset="utf-8">
  <title>Inscripcion Alumnos en Carreras</title>
  <script src="../jquery/jquery.min.js"></script>
  <link href="../../css/grid.css" rel="stylesheet">
  <script src="../js/functions.js"></script>
  <!--SWEETALERT-->
  <script src="../js/sweetalert.min.js"></script>
<!-- SCRIPTS JS-->
<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
<!--ICONOS --->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<body>

    <body class="bg-light">
    <div class="container">
    <div class="py-5 text-center">
    <div class="col-12 text-center">
    <img class="mb-12" src="../../imagenes/logos.png" width="500" height="100">
     <hr>
    </div>
    <div class="col-md-12 order-md-1 align-center">
    <h4 class="mb-3">Incripcion  Alumnos en Carreras</h4>
    <div class="row">
    <div class="col-5">
    <!--FORMULARIO--->
    <form action="enviar.php" method="post"  >
    <label for="firstName">Carreras:</label>
    <select class="form-control" name="carreras" id="carreras">
    <option value="0">Seleccione</option>
    </select>
    </div>
    <div class="col-2">
    <label for="firstName">Ciclo Lectivo:</label>
    <select class="form-control" name="ciclos" id="ciclos" >
    <option value="0">Año</option>
    </select>
      </div> 
      <!--cierro row -->
    <div class="col-2">
    <label for="date">Fecha De Incripcion</label>
    <input type="date" class="form-control" id="fecha"  name="fecha"  required>
    </div> 
    <div class="col-3">
    <label for="firstName">DNI Alumno:</label>
    <input type="text" class="form-control"  name="dni" id="dni" required>
    <div class="invalid-feedback">
    </div>
    <div class="row">
    <div class="col">
    <div class="d-flex justify-content-end">
      <!-- retorno el motodo --->
    <button type="submit"  class="btn btn-info"  name="registrar"><i class="fas fa-save"></i> Registrar</button>
</form>
    <div class="col">
    <button  class="btn btn-danger" onclick="location.href='../../menu.php'" name="cancelar" > <i class="fas fa-home"></i> Cancelar</button>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>  <!--cierro container -->
    
<!--ACA SE MUESTRA LA TABLA -->
