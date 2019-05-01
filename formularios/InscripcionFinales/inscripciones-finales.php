<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../../../../favicon.ico">

  <title>Incripcion a Mesas Finales</title>
  <script src="../jquery/jquery.min.js"></script>
    <!-- Bootstrap core CSS -->
  <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- Custom styles for this template -->
  <link href="../../css/grid.css" rel="stylesheet">
   <body class="bg-light">
    <div class="container">
      <div class="py-5 text-center">
      <div class="col-12 text-center">
      <img class="mb-12" src="../../imagenes/logos.png" width="500" height="100">
     <hr>
    </div>
    <div class="col-md-12 order-md-1 align-center">
    <h4 class="mb-3">Inscripcion Mesas Finales</h4>
    <form action="enviar.php" method="POST">
    <div class="row ">
    <div class="col-2">
    <label for="firstName">DNI</label>
    <input type="text" class="form-control" id="dni" name="dni" maxlength="10" required>
    </div>
    <div class="col-4">   
    <br>   
    <button type="submit" class="btn btn-success"><i class="fas fa-search"></i> Buscar Alumno</button></form> 
    <button  class="btn btn-danger" onclick="location.href='../../menu.php'" name="cancelar"> <i class="fas fa-home"></i> Cancelar</button>
    </div>

<div class="col-2">
<label for="firstName"><strong>Modalidad Libre</strong></label>
<form action="libre.php" method="post">
<hr>
    <input type="text" class="form-control" id="dniL" name="dniL" maxlength="10" placeholder="Ingrese dni " required>
    <br>
<button class="btn btn-info" type="submit" ><i class="fas fa-search"></i> Buscar</button> 
</div>  </form> 
<!---
<div class="col-2">
    <label for="firstName"><strong>Libre (sin cursada)</strong> </label>
<form action="noCurso.php" method="post">
<hr>
    <input type="text" class="form-control" id="dniSc" name="dniSc" maxlength="10" placeholder="Ingrese dni " required>
    <br>
<button class="btn btn-dark" type="submit" ><i class="fas fa-save"></i> No  Curso</button> 
</div>  </form> -->

</div>
    
    <hr>
    
  </body>
</html>



