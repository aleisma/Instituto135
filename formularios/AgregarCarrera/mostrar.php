<?php
require '../../scripts/Funciones.php';
conectar();
$carreras=getCarreras();
?>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta charset="utf-8">
  <title>Inscripcion Alumnos en Carreras</title>
  <!---JQUERY-->
  <script src="../jquery/jquery.min.js"></script>
 
  <!----ALERTIFY----->
  <script src="../js/alertifyjs/alertify.min.js"></script>
    <link href="../js/alertifyjs/css/alertify.min.css" rel="stylesheet">
    <!-- Default theme -->
    <link rel="stylesheet" href="../js/alertifyjs/css/themes/default.min.css"/>
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="../js/alertifyjs/css/themes/semantic.min.css"/>
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="../js/alertifyjs/css/themes/bootstrap.min.css"/>
<!-- SCRIPTS JS-->
<link href="../../css/grid.css" rel="stylesheet">
<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
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
    <h4 class="mb-3"> Carrera</h4>

<div class="container">

<div class="row">

<form action="carreras.php" method="post">
<label for="firstName">Eliga Carrera:</label>
<select class="form-control" name="carreras" id="carreras">
<?php foreach($carreras as $fila):?>
<option value="<?php echo $fila[0];?>"><?php echo $fila[1];?>
<?php $carreras=$fila[0];?>
<?php endforeach; ?> </select>
</div> <!---cierro col-9--->
<div class="col">
<button  type="submit" class="btn btn-dark" > <i class="fas fa-search"></i> Buscar</button>
</form>
<button class="btn btn-warning" onclick="location.href='agregarCarrera.php'" > <i class="fas fa-undo-alt"></i> Volver</button>
</div>
</div>

</div>
</body>

</html>