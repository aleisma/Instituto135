<?php
require '../../scripts/Funciones.php';
conectar();



//ACA RECOLECTO LOS DATOS DEL FORMULARIO...
$ciclos=     $_POST['ciclos'];
$materias=   $_POST['materias'];
$ins=        $_POST['ins'];
    $conexion = mysqli_connect('localhost', 'root', '', 'Instituto');
    mysqli_set_charset($conexion, 'utf8');

    $profesor=getProfesores();
    $final=getFinales($materias,$ins,$ciclos);
    $mat=Materias($materias);
desconectar();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">


<style>

.t1{ 
    width: 4%;
}
.t2{ 
    width: 7%;
}
.t3{ 
    width: 25%;
}
.t4{ 
    width: 35%;
}
</style>
    <title>Registro de Mesas Finales</title>

   <script src="../jquery/jquery.min.js"></script>
  <!-----estilo de la pagina---->
  <link href="../../css/grid.css" rel="stylesheet">
    <!----ALERTIFY----->
    <script src="../js/alertifyjs/alertify.min.js"></script>
    <link href="../js/alertifyjs/css/alertify.min.css" rel="stylesheet">
    <!-- Default theme -->
    <link rel="stylesheet" href="../js/alertifyjs/css/themes/default.min.css"/>
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="../js/alertifyjs/css/themes/semantic.min.css"/>
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="../js/alertifyjs/css/themes/bootstrap.min.css"/>

<!---iconos--->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

<!-- SCRIPTS JS-->
<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">


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

<script>  
function preguntarSiNo(dni){
	alertify.confirm('Guardar Datos', '¿Desea Guardar Este Registro?', 
					function(){ agregarDatos(dni) 
                    
                    
                        var notification = alertify.notify('Agregado con Exito!!', 'success', 5, function(){  console.log('dismissed'); });
                    }
                , function(){ 
                    alertify.error('Se Cancelo!!')});
                
}
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
    
<button type="button" class="btn btn-danger" onclick="location.href='../../menu.php'" > <i class="fas fa-home"></i> Cancelar</button>
<button type="button" class="btn btn-warning" onclick="location.href='registro-finales.php'" > <i class="fas fa-undo-alt"></i> Volver</button>
    <hr>

<div class="list-group">
<?php
foreach($mat as $dat): ?>
 <label for="firstName">Materia:</label>
 <select class="form-control" name="materias" id="materias"  disabled>
 <option value="<?php echo $dat[0];?>"><?php echo $dat[1];?></option>
 </select>
<?php endforeach;?>
  <a href="#" class="list-group-item list-group-item-action list-group-item-primary"><strong><?php echo "Anio Lectivo: ".$ciclos;?></a>
  <a href="#" class="list-group-item list-group-item-action list-group-item-dark"><strong><?php echo "Fecha: ".$ins;?></strong></a>
</div>  

<div class="row">
<div class="col-sm-6" id="tabla1">
<div class="scrollme">  
<div class="table-responsive">
<table class="table table-hover table-condensed table-bordered">
<thead>
<tr class="bg-info">
  <td>Profesor</td>
	<td>Nota </td>
		</tr>
		</thead>
		<tbody>

     <td class="t3"><select class="form-control" name="profesores" id="profesores">
    <?php foreach($profesor as $fila):?>
                <option value="<?php echo $fila[0];?>"><?php echo $fila[1]." ". $fila[2];?>
                <?php $profesores=$fila[1];?>
               <?php endforeach; ?>
             
    </select>
    </td>
       <td class="t2"><input type="text" class="form-control" id="nota" name="nota"></td>
</tr></tbody>
</table></div></div></div>
<div class="col-sm-5" id="tabla2">
<div class="scrollme">  
<div class="table-responsive">
<table class="table table-hover table-condensed table-bordered">
<thead>
<tr class="bg-info">
  <td>DNI</td>     
  <td>Registrar</td>    
		</tr>
		</thead>
		<tbody>
       <?php 	
conectar(); 
//while($dat=mysqli_fetch_row($result)){
    foreach($final as $dat): 
       ?>
<tr>
    <td class="t2"><input type="text" class="form-control" value="<?php echo $dat[3];?>" disabled> 
     <?php $dni=$dat[3]; ?>     
    </td>
	   <td class="t1">
       <button class="btn btn-success" data_id="1" id="registrar" onclick='preguntarSiNo(<?php echo $dni; ?>)'>         
         <i class="fas fa-check-circle"> </i>         
     </button></td><?php endforeach; ?>
</tr></tbody>
</table>
<!------------------------------------------------------------------------------------------------->
</div>
</div>
</body>
</html>
<script>

//FUNCION PARA AGREGAR DATOS
function agregarDatos(dni)
{    var materias=$('#materias').val();
     var nota=$('#nota').val();
     var profesores=$('#profesores').val();
    cadena="dni=" + dni +"&profesores=" + profesores +"&nota="+nota+"&materias="+materias;
$.ajax({
    type:"POST",
    url:"registrar.php",
   data:cadena,
    success:function(r){
        if(r==0){ 
            alertify.success("agregado con exito :)");  
            var nota=$('#nota').val("");

        }else{
           // alertify.error("Fallo el servidor :(");
          // var nota=$('#nota').val("");
	        //var ins=$('#ins').val("");
        }
    }
});

}
</script>
