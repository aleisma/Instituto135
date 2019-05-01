<?php 
require '../../scripts/Funciones.php';
conectar();
$carreras=    $_POST["carreras"];
$sql="SELECT m.ID_Materia, m.nombre_materia,m.anio_materia FROM carreras c 
      INNER JOIN materias m ON c.ID_Carrera = m.ID_Carrera WHERE c.ID_Carrera='$carreras'";
$result= mysqli_query($conexion,$sql);

$car=carrerasSelect($carreras);
?>
<!DOCTYPE html>
<html lang="es">
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
<script>  
function preguntarSiNo(id){
  alertify.confirm('Eliminar Datos', '¿Esta Seguro De Eliminar Esta Materia?', 
					function(){ eliminarDatos(id) }
                , function(){ alertify.error('Se cancelo')});
}

function eliminarDatos(id){
	cadena="id=" + id;
		$.ajax({
			type:"POST",
			url:"eliminar.php",
			data:cadena,
			success:function(r){
				if(r==1){
          error("Fallo el servidor :(");
				}else{
				
          	alertify.success("Eliminado con exito!");
            //Recargo la pagina luego de 1seg
setTimeout(function(){location.href="agregarCarrera.php"} ,500);   
				}
			}
		});
}
</script>

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
    <div class="row">   
    <div class="col-8">
    <h4 class="mb-3"> Carrera: </h4>
<select class="form-control" name="carreras" id="carreras" disabled>
<?php foreach($car as $c):?>
<option value="<?php echo $c[0];?>"><?php echo $c[1];?>
<?php endforeach; ?> </select>
<br>
</div>
<div class="col-3">

<button type="button" class="btn btn-warning" onclick="location.href='mostrar.php'" > <i class="fas fa-undo-alt"></i>Volver</button>
<button class="btn btn-dark" onclick="location.href='../../menu.php'" > <i class="fas fa-home"></i> Menu</button>
</div>
</div>
<div class="row">
<div class="col-sm-9">
<table class="table table-hover table-condensed table-bordered">
<thead>
<tr class="bg-info">
    <td>Materia</td>
	<td>Año</td>
	<td>Eliminar</td>
		</tr>
		</thead>
		<tbody>
		<?php 	
conectar(); 

while($ver=mysqli_fetch_row($result)){ 
            $datos=$ver[0]."||".
                   $ver[1]."||".
				   $ver[2];
                

      $id=$ver[0];
		?>
		<tr>
		<td><?php echo $ver[1] ?></td>
		<td><?php echo $ver[2] ?></td>
    <td ><button data_id="1" class="btn btn-danger fas fa-trash" onclick="preguntarSiNo('<?php echo $ver[0] ?>')" > 
     </button></td>
		<?php }?>
		</tr>
		</tbody>
		</table>
          </div>
</body>
</html>
