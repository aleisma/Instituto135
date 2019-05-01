<?php
require '../../scripts/Funciones.php';
conectar();
$profesores=getProfesores();

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Registro de Mesas Finales</title>

   <script src="../jquery/jquery.min.js"></script>
  <link href="../../css/grid.css" rel="stylesheet">
  <script src="ajax.js"></script>
  <!--SWEETALERT-->
  <script src="../js/sweetalert.min.js"></script>
<!-- SCRIPTS JS-->
<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">

<!--ICONOS --->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

  </head>

  <body>
<!---Aca el ajax para cargar las materias--->
<script language="javascript">
$(document).ready(function(){
$("#buscar").click(function (e){
$("#carreras option:selected").each(function (){
        var chekradio = $('input:radio[name=ciclos]:checked').val();
        id_tecnicatura = $(this).val();
        $.post("cargarMaterias.php", { id_tecnicatura: id_tecnicatura,chekradio:chekradio },
        function(data){
        $("#materias").html(data);
         });            
      });
    })
}); 
</script>
 </head>
    <body class="bg-light">
    <div class="container">
    <div class="py-5 text-center">
    <div class="col-12 text-center">
    <img class="mb-12" src="../../imagenes/logos.png" width="500" height="100">
    <hr>
    </div>
    <div class="col-md-12 order-md-1 align-center">
    <h4 class="mb-3">Registrar Notas De Mesas Finales</h4>

    <div class="row">
    <div class="col-5">
    <form action="enviar.php" method="post">
    <label for="firstName">Carreras:</label>
    <select class="form-control" name="carreras" id="carreras" required>
    <option value="0">Seleccione</option>
    </select>
    </div>
    <div class="col-2">
    <label for="anioL">Año:</label>
      <br> <input type="radio" name="ciclos" value="1" id="ciclos"> 1er año
      <br> <input type="radio" name="ciclos" value="2" id="ciclos"> 2do año
      <br> <input type="radio" name="ciclos" value="3" id="ciclos"> 3er año
      <br> <input type="radio" name="ciclos" value="4" id="ciclos"> 4to año
<br>
  <button class="btn btn-dark" id="buscar">Cargar Materias</button>   </div>
<div class="col-4">
 <label for="firstName">Materia:</label>
 <select class="form-control" name="materias" id="materias" >
 <option value="0">Eliga una Materia</option>
 </select>
 <label for="date">Fecha De Mesa</label>
 <input type="date" class="form-control" id="ins"  name="ins"  required>
 </div>
 </div><div class="col">
<button  class="btn btn-info" name="guardar"  > <i class="fas fa-search"></i> Buscar Registrados</button> 
<button type="button" class="btn btn-danger" onclick="location.href='../../menu.php'" > <i class="fas fa-home"></i> Cancelar</button>
    <hr>
    </div></form></div>    
  </body>
</html>



