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

<script>
   //REGISTRO NEW SALIDA
function Enviar(){
  var carreras=$('#carreras').val();
  var nombre=$('#nombre').val();
  var apellido=$('#apellido').val(); 
  var dni=$('#dni').val();
  var tipo=$('#tipo').val(); 
  var fecha=$('#fecha').val();
var cadena = 'carreras='+carreras+'&nombre='+nombre+'&apellido='+apellido+'&dni='+dni+'&tipo='+tipo+'&fecha='+fecha;
$.ajax({
type: 'post',
url:'insert.php',
data:cadena,
success:function(resp){
    swal({
  title: "Alumno Registrado",
  text: "Presione acceptar",
  icon: "success",
  button: "Aceptar",
});
//vacio los campos
var nota=$('#apellido').val("");
var nombre=$('#nombre').val("");
var dni=$('#dni').val("");
var tipo=$('#tipo').val("");
}
});   
return false;
}

</script>
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
    <h4 class="mb-3">Reporte De  Salidas Educativas</h4>
    <!--FORMULARIO--->
<div class="container">
<div class="row">
<div class="col-6">
<form  method="post" onsubmit="return Enviar();">
<label for="">Eliga una Carrerra:</label>
<select class="form-control" name="carreras" id="carreras">
<?php foreach($carreras as $fila):?>
<option value="<?php echo $fila[0];?>"><?php echo $fila[1];?>
<?php $carreras=$fila[0];?>
<?php endforeach; ?> </select>
</div>
<div class="col-2">
<label for="nombre">Nombre</label>
<input class="form-control" type="text" id="nombre" name="nombre" maxlength="15"required>
</div>
<div class="col-2">
<label for="apellido">Apellido</label>
<input type="text" class="form-control" id="apellido" name="apellido" maxlength="15"required>
   </div>
   <div class="col-2">
   <label for="dni">DNI</label>
<input type="text" class="form-control" id="dni" name="dni" maxlength="9" required>
</div></div>
<div class="row">
<div class="col-2">
<label for="trabaja">Tipo</label>
                <select class="custom-select d-block w-100" id="tipo" name="tipo" required >
                  <option value="">Eliga</option>
                  <option>Alumno</option>
                  <option>Docente</option>
                  <option> No Docente</option>
                </select>
                </div>

<div class="col-2">
<label for="apellido">Fecha</label>
<input type="date" class="form-control" id="fecha" name="fecha" required>
<br>
<button   class="btn btn-success"  ><i class="fas fa-plus-circle"></i>  Agregar</button></form>
</div>
<hr><hr><hr>
<div class="col-5">
<button  class="btn btn-info"  name="imprimir"onclick="location.href='imprimir.php'"> <i class="fas fa-print"></i> Imprimir</button>
<button  class="btn btn-danger" onclick="location.href='../../../menu.php'" name="cancelar"> <i class="fas fa-home"></i> Cancelar</button>
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
<script>
function Print(){
  var carreras=$('#carreras').val();
  var fecha=$('#fecha').val();
    cadena="carreras=" + carreras +"&fecha="+ fecha;
    alert(cadena)
$.ajax({
type: 'post',
url:'print.php',
data:cadena,
success:function(resp){
    swal({
  title: "Materia Registrada",
  text: "Presione acceptar",
  icon: "success",
  button: "Aceptar",
});
}
});   
}
</script>