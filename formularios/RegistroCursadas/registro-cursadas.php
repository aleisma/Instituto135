
<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="../../../../favicon.ico">
    <title>Ingresar Notas de Cursadas</title>

   <script src="../jquery/jquery.min.js"></script>
  <link href="../../css/grid.css" rel="stylesheet">
  <script src="functions.js"></script>
  <!--SWEETALERT-->
  <script src="../js/sweetalert.min.js"></script>
<!-- SCRIPTS JS-->
<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
<!---ICONOS-->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

<style>

</style>
  </head>
    <body class="bg-light">
    <div class="container">
      <div class="py-5 text-center">
      <div class="col-12 text-center">
      <img class="mb-12" src="../../imagenes/logos.png" width="500" height="100">
     <hr>
    </div>
    <div class="col-md-12 order-md-1 align-center">
    <h4 class="mb-3">Registro De Notas de Cursadas</h4>
    <div class="row">


<div class="col-6">
<form action="getMaterias.php" method="post">
<label for="carreras">Carreras:</label>
    <select class="form-control" name="carreras" id="carreras">
    <option value='0'>Seleccione</option>
    </select>
    <hr> </div>
    <div class="col-2">
<label for="ciclos">Ciclo Lectivo:</label>
    <select class="form-control" name="ciclos" id="ciclos" >
    <option value="0">Año</option>
    </select>
    </div>
    
    </div>
<hr>
<button type="submit" class="btn btn-success" id="consultar"><i class="fas fa-search"></i>Buscar  Registrados</button>
<button type="button" class="btn btn-danger" onclick="location.href='../../menu.php'" ><i class="fas fa-home"></i>Cancelar</button>
<hr>
</div>
</body>
</html>

