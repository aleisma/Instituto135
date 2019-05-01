<?php
require 'Funciones.php';
conectar();
$carreras=getCarreras();
?>


<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta charset="utf-8">
  <script src="../../jquery/jquery.min.js"></script>
  <link href="../../../css/grid.css" rel="stylesheet">

  <!--SWEETALERT-->
  <script src="../../js/sweetalert.min.js"></script>
<!-- SCRIPTS JS-->
<link rel="stylesheet" href="../../../bootstrap/css/bootstrap.min.css">

<!--ICONOS --->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<body>
    <body class="bg-light">
    <div class="container">
    <div class="py-5 text-center">
    <div class="col-12 text-center">
    <img class="mb-12" src="../../../imagenes/logos.png" width="500" height="100">
     <hr>
    </div>
    <div class="col-md-12 order-md-1 align-center">
    <h4 class="mb-3">Imprimir Reporte De  Salidas Educativas</h4>
    <!--FORMULARIO--->
<div class="container">
<div class="row">
<div class="col-6">
<form  method="post" action="print.php">
<label for="">Eliga una Carrerra:</label>
<select class="form-control" name="carreras" id="carreras">
<?php foreach($carreras as $fila):?>
<option value="<?php echo $fila[0];?>"><?php echo $fila[1];?>
<?php $carreras=$fila[0];?>
<?php endforeach; ?> </select>
</div>
<div class="col-3">
<label for="fecha">Fecha</label>
<input type="date" class="form-control" id="fecha" name="fecha" required>
</div>
<div class="col-2">
<br>
<button  class="btn btn-info" type="submit" > <i class="fas fa-print"></i> Imprimir</button></form>
<hr>
<button  class="btn btn-danger" onclick="location.href='../../../menu.php'" name="cancelar"> <i class="fas fa-home"></i> Cancelar</button>
</div>
<hr><hr><hr>
<div class="col-5">

</div>
<hr>
<div class="row">
</div>
</div>
</div>
</div>
</div> <!---ROW--->
</div> <!--container-->
</body>
</html>
