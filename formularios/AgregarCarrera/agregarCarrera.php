
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="../../imagenes/logos.png">
<title>ALTA DE NUEVA CARRERA </title>
<!---CSS-->
<link href="../../css/grid.css" rel="stylesheet">
<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
<!--SWEETALERT-->
<script src="../js/sweetalert.min.js"></script>
<!-- SCRIPTS JS-->
<script src="../jquery/jquery.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<script>
    //ENVIO CARRERA NEW//////////////////////////////////////////////////////////////
function Enviar(){
var carrera= document.getElementById('carrera').value;
var resolucion= document.getElementById('resolucion').value;
var duracion= document.getElementById('duracion').value;

var dataen = 'carrera='+carrera+'&resolucion='+resolucion+'&duracion='+duracion;
$.ajax({
type: 'post',
url:'enviar.php',
data:dataen,
success:function(resp){
    swal({
  title: "Carrera Registrada",
  text: "Presione acceptar",
  icon: "success",
  button: "Aceptar",
});
//vacio los campos
var carrera= document.getElementById('carrera').value="";
var resolucion= document.getElementById('resolucion').value="";

//Recargo la pagina luego de 1seg
setTimeout(function(){location.href="agregarCarrera.php"} , 500);   
}
});   
return false;
}
</script>
<script>
//CICLO LECTIVO A LA CARRERA AGREGADA
function Ciclos(){
var tecnicatura= document.getElementById('tecnicatura').value;
var ciclos= document.getElementById('ciclos').value;
var tiempo= document.getElementById('tiempo').value;
var cadena = 'tecnicatura='+tecnicatura+'&tiempo='+tiempo+'&ciclos='+ciclos;
$.ajax({
type: 'post',
url:'enviar.php',
data:cadena,

success:function(resp){
    swal({
  title: "Ciclo Lectivo Registrado!!",
  text: "Presione acceptar",
  icon: "success",
  button: "Aceptar",
});
//vacio los campos
//Recargo la pagina luego de 1seg
//setTimeout(function(){location.href="agregarCarrera.php"} , 500);   
}
});   
return false;
}
</script>


</head>
<body>
<div class="container">
<div class="py-7 text-center">
<div class="col-12 text-center">
<img class="mb-12" src="../../imagenes/logos.png" width="500" height="100">
<hr>

<h4 class="mb-3">Dar de alta nueva carrera</h4>
<div class="row">
<div class="col-4">
<form  method="post"  onsubmit=" return Enviar();" >
<label for="carrera">Nombre De Carrera:</label>
<input type="text" class="form-control" id="carrera" name="carrera"  required>
</div>
<div class="col-2">
<label for="carrera">Resolución</label>
<input type="text" class="form-control" id="resolucion" name="resolucion"  required>
</div>

<div class="col-2">
<label for="duracion">Duración</label>
<input type="number" class="form-control" id="duracion" name="duracion" max="4" min="0" required>
</div>
<div class="col-3">
<button class="btn btn-info" name="enviar" id="enviar"> <i class="far fa-save"></i> Guardar</button>
<button type="button" class="btn btn-danger" onclick="location.href='../../menu.php'" ><i class="fas fa-home"></i> Cancelar</button>
</div>
</div>
</form>
</div> <!---cierro el row-->
<!-----------AGREGAR CICLO LECTIVO---------------------------->
<div class="container">
<div class="row">
<div class="col-6">
<?php
require_once '../../scripts/Funciones.php';
conectar();
$carreras=getCarreras();
?>
<form method="post" onsubmit="return Ciclos();">
<label for="firstName">Listado de Carreras:</label>
<select class="form-control" name="tecnicatura" id="tecnicatura">
<?php foreach($carreras as $fila1):?>
<option value="<?php echo $fila1[0];?>"><?php echo $fila1[1];?>
<?php endforeach; ?> </select>
</div> <!---cierro col-9--->
<div class="col-2">
<label for="ciclos">Ciclo Lectivo</label>
<input type="text" class="form-control" id="ciclos" name="ciclos"  required>
</div>
<div class="col-2">
<label for="tiempo">Duración</label>
<input type="number" class="form-control" id="tiempo" name="tiempo" max="4" min="1" required>
</div>
<div class="col-2">
<button  class="btn btn-primary"> <i class="far fa-save"></i> Guardar</button></form> 
</div>

<hr>
<!---AGREGAR MATERIAS---->
<div class="container">
<div class="row">
<div class="w-100"></div>
<div class="col-6">
<?php
require_once '../../scripts/Funciones.php';
conectar();
$carreras=getCarreras();
?>
<form method="post" onsubmit="return agregarDatos();">
<label for="firstName">Eliga Carrera:</label>
<select class="form-control" name="carreras" id="carreras">
<?php foreach($carreras as $fila):?>
<option value="<?php echo $fila[0];?>"><?php echo $fila[1];?>
<?php $carreras=$fila[0];?>
<?php endforeach; ?> </select>
</div> <!---cierro col-9--->
<div class="col-2">
<label for="anio">Año Lectivo</label>
<input type="number" class="form-control" id="anio" name="anio" max="4" min="0" required>
</div>
<div class="col-3">
<label for="carrera">Agrega Materia</label>
<input type="text" class="form-control" id="materia" name="materia"  required>
<br>
<button  class="btn btn-success"> <i class="far fa-save"></i> Guardar</button></form> 
<hr>

<form action="mostrar.php" method="post">
<button  type="submit"class="btn btn-dark" ><i class="fas fa-search"></i> Mostrar Carreras y Materias</button></form>
</div>
</div>
</div> <!--container-->
 
</div></div></div></div>
</body>
</html>
<script>
//FUNCION PARA AGREGAR DATOS
function agregarDatos(){
  var carreras=$('#carreras').val();
  var materia=$('#materia').val();
    var anio=$('#anio').val();
    cadena="carreras=" + carreras +"&materia="+ materia+"&anio="+ anio;
$.ajax({
type: 'post',
url:'enviar.php',
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
return false;
}
</script>


