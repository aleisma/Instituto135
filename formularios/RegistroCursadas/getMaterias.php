
<?php 
require '../../scripts/Funciones.php';
conectar();

$carreras=getCarreras();
$profesores=getProfesores();

$carrera= $_POST['carreras'];
$ciclo= $_POST['ciclos'];

//$materias=getMaterias($carrera,$_POST['radio1']);

$sql ="SELECT a.DNI,a.apellido,a.nombre,c.aniolectivo FROM inscripciones i INNER JOIN alumnos a ON a.DNI = i.DNI 
INNER JOIN cicloLectivo c on c.aniolectivo=i.Ciclolectivo 
INNER JOIN carreras ca on ca.ID_Carrera = c.ID_Carrera AND i.ID_Carrera = c.ID_Carrera 
WHERE i.ID_Carrera='$carrera' AND i.Ciclolectivo='$ciclo'";

$result=mysqli_query($conexion,$sql);

if(!$result){
}
else{


}

		?>
<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="../../../../favicon.ico">
    <title>Ingresar Notas de Cursadas</title>

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
<!---Aca el ajax para cargar las materias--->
<script language="javascript">
$(document).ready(function(){
$("#buscar").click(function (e){
$("#carreras option:selected").each(function (){
        var chekradio = $('input:radio[name=anio]:checked').val();
        id_carrera = $(this).val();
        $.post("cargarMaterias.php", { id_carrera: id_carrera,chekradio:chekradio },
        function(data){
        $("#materias").html(data);
         });            
      });
    })
}); 
</script>

<!----Aca registro los alumnos-------->
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
<style>

th {
   width: 15%;
   text-align: left;
}
.input{
    width: 50%;
    text-align: center;
}

.t1{ 
    width: 12%;
}
.t2{ 
    width: 22%;
}
.scrollme {
    overflow-y: auto;
}
table {
   width: 100%;
}
.ca{
    width: 32%;

}

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
  
<div class="container">
<div class="row">   

<div class="col-5">
<label for="">Elegiste la Carrera : </label> 
<SELECT  class="form-control" name="carreras" id="carreras" disabled>
<?php
foreach($carreras as $fila):
?>
<OPTION value="<?php echo $carrera?>"><?php echo $carreras[$carrera-1][1]; ?></OPTION>
<?php endforeach; ?>
</SELECT>
</div>
<div class="col-3">
<label for="">Seleccione Profesor : </label>  
<select class="form-control" name="profesores" id="profesores">
<?php
foreach($profesores as $fila):
?>
<OPTION value="<?php echo $fila[0]?>"><?php echo $fila[1];
echo " ".$fila[2];
?></OPTION>
<?php endforeach; ?>
</select>
</div>
<div class="col-4">
<label for="">Seleccione Materias : </label>
<select class="form-control" name="materias" id="materias">
<br>
</select>

</div>

</div>
</div>

<!---esto es nuevo--->

<!--<h5>Año Lectivo: <?php echo $_POST["anio"];?> </h5>  -->
</div>

<!--<input type="text" class="form-control" disabled  id="anioL"value="<?php echo $_POST["anio"]; ?>"> -->


<div class="row">
<div class="col-5">

<ul class="list-group">
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Primer Año
    <span class="badge badge-primary badge-pill"><input type="radio" name="anio" id="anio" value="1" data_id="1"></span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Segundo Año
    <span class="badge badge-primary badge-pill"><input type="radio" name="anio" id="anio" value="2" data_id="2"></span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
 Tercer Año
    <span class="badge badge-primary badge-pill"><input type="radio" name="anio" id="anio" value="3" data_id="3"></span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
 Cuarto Año
    <span class="badge badge-primary badge-pill"> <input type="radio" name="anio" id="anio" value="4" data_id="4"></span>
  </li>
</ul>
     
</div>
<div class="col-7">
<div class="container">
<div class="row" >
<div class="col-sm-12">
<div class="scrollme" >  
<div class="table-responsive">
<table class="table table-hover table-condensed table-bordered">
<thead>
<tr class="bg-info" >
   <td >Estado</td> 
    <td>Nota</td>          
    <td>% Asistencias</td>  
    <td>Fecha</td>             
		</tr>
		</thead>
		<tbody >
	
		<tr><td class="t2">
        <select  id="tipo" name="tipo" class="form-control">
      <option value="0">Seleccione</option>
      <option value="Si">Aprobado</option>
      <option value="No">Desaprobado</option>
      </select>
        </td>
        <td class="t1" > <input type="number"class="form-control" id="nota" name="nota" min="1" max="10"></td>
		<td class="t1" ><input type="number"  class="input" name="asistencia" id="asistencia" placeholder="%" step="1" min="40" max="100"></td>
        <th class="t1" ><input type="date" class="form-control" id="fecha"  name="fecha"  required> </th> 
       </tr> </tbody>
		</table>
 </div></div>
 <button type="button" class="btn btn-danger" onclick="location.href='../../menu.php'" ><i class="fas fa-home"></i>Cancelar</button>
      <button type="button" class="btn btn-warning" onclick="location.href='registro-cursadas.php'" > <i class="fas fa-undo-alt"></i>Volver</button>
      <button type="button" id="buscar" class="btn btn-info" value="Cargar Materias"><i class="fas fa-search"></i>Cargar Materias </button>
</div>
</div><hr></div></div>

<!--cierro col materias-->
<!------>

<div class="container">
<div class="row" >

<div class="col-sm-12" id="tabla2">
<div class="scrollme">  
<div class="table-responsive">
<table class="table table-hover table-condensed table-bordered">
<thead>
<tr class="bg-info">
    <td>DNI</td>     
    <td>Apellido</td>
	<td>Nombre</td>
	<td>Registrar</td>      
		</tr>
		</thead>
		<tbody>
		<?php 	
conectar(); 
while($ver=mysqli_fetch_row($result)){ 
			$datos=
                     $ver[0]."||". //DNI
                     $ver[1]."||". //apellido
                     $ver[2]."||". //nombre
                     $ver[3];    //aniolectivo
                          
                $anio= $ver[3];               
                 $dni=$ver[0]; //guardo el dni en una variable
		?>
		<tr id="mostrar">
        <td><?php echo $dni; ?> </td>
        <td><?php echo $ver[1] ;?></td>
        <td ><?php echo $ver[2] ;?></td>
	    <td class="t1" ><button class="btn btn-success" data_id="1" id="registrar" onclick="preguntarSiNo(<?php echo $ver[0]?>)">
         <i class="fas fa-check-circle"> </i>         
     </button></td> </td>
		<?php  };?> </tr> </tbody>
		</table>
    </div></div></div></div></div></div></div>
    </div></div>


<script>
 function agregarDatos(dni)
{
   var anio=$('#anio').val();
    var materias=$('#materias').val();
	var nota=$('#nota').val();
	var tipo=$('#tipo').val();
    var profesores=$('#profesores').val();
    var asistencia=$('#asistencia').val();
    var fecha=$('#fecha').val();

cadena="anio=" + anio +"&materias=" + materias +"&dni=" + dni + "&nota=" + nota +"&tipo=" + tipo +
       "&profesores="+profesores+"&asistencia="+asistencia+"&fecha="+fecha;

    
     // $("#mostrar").load(" #mostrar");
 
$.ajax({
    type:"POST",
    url:"registrar.php",
   data:cadena,
    success:function(r){
     
        if(r==1){
            alertify.success("agregado con exito :)");  

            var nota=$('#nota').val("");
	        var tipo=$('#tipo').val("");
            var asistencia=$('#asistencia').val("");
 

        }else{
           // alertify.error("Fallo el servidor :(");
            var nota=$('#nota').val(" "); 
	        var tipo=$('#tipo').val("");
            var asistencia=$('#asistencia').val("");
 
        }
    }
});

}
</script>

<script>
$(document).ready(function(e){
    $("#registrar").click(function(e){
   
     // $("#registrar").hide(2000);
        //$("#registrar").show(3000);
    });
    return false;
});
</script> 

<script>

</script>

