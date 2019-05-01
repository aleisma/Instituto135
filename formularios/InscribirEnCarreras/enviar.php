
<?php
 require '../../scripts/Funciones.php';

//ACA RECOLECTO LOS DATOS DEL FORMULARIO...
conectar();
  if( isset($_POST['carreras']) ){

	$ciclos=    $_POST['ciclos'];
	$carreras=  $_POST['carreras'];
	$dni=       $_POST['dni'];
  $fecha=     $_POST['fecha'];
  
  
//me conecto a la base de datos
    $conexion = mysqli_connect('localhost', 'root', '', 'Instituto');
  mysqli_set_charset($conexion, 'utf8');
  $car=carrerasSelect($carreras);
//VERIFICO QUE EL DNI NOSE ENCUENTRE ANOTADO EN INSCRIPCIONES...
$duplicado=mysqli_query($conexion,"SELECT * FROM inscripciones WHERE DNI='{$dni}' AND ID_Carrera='$carreras'");
$respuesta=mysqli_num_rows($duplicado);
//lo anoto
if($respuesta==0)
 {  
//busco si  el dni esta registrado en alumnos...
$sql1="SELECT * FROM alumnos WHERE DNI='{$dni}'";
$result1= mysqli_query($conexion,$sql1);
$fila= mysqli_num_rows($result1);

 if($fila==0)
 {  
  echo"<script type=\"text/javascript\">alert('Atencion!! Alumno No Inscripto,Debe Registralo Antes De Inscribirlo a una Carrera.'); window.location='../RegistrarAlumnos/registro-alumno.php';</script>"; 
}
else{  
//inserto alumnos en la tabla inscripciones	
$inscripciones="INSERT INTO inscripciones (Ciclolectivo,ID_Carrera,DNI,fecha_inscripcion) VALUES ('$ciclos','$carreras','$dni','$fecha')";
$resultado= mysqli_query($conexion,$inscripciones);
//hago un inner join entre la tabla inscripciones,alumnos y carreras,luego imprimo alumnos inscriptos...		
$sql="SELECT i.ID_Inscripcion,a.DNI, a.apellido, a.nombre FROM inscripciones i INNER JOIN alumnos a ON a.DNI=i.DNI 
INNER JOIN cicloLectivo c on c.aniolectivo=i.Ciclolectivo INNER JOIN carreras ca on ca.ID_Carrera=c.ID_Carrera 
  AND i.ID_Carrera=c.ID_Carrera WHERE i.ID_Carrera='{$carreras}' AND i.Ciclolectivo='{$ciclos}'";

$result=mysqli_query($conexion,$sql);
desconectar();
} 
}
else{ 

 echo"<script type=\"text/javascript\">alert('ATENCION!! EL ALUMNO YA SE ENCUENTRA REGISTRADO ERROR, AL DUPLICARLO!!.'); window.location='inscripcion-alumnos-carreras.php';</script>"; 
}
} //cierro isset

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
<script>  
function preguntarSiNo(id){
  alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?', 
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
setTimeout(function(){location.href="inscripcion-alumnos-carreras.php"} ,500);   
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
    <h4 class="mb-3">Incripcion  Alumnos en Carreras</h4>
    <div class="row">
    <div class="col-5">
    <!--FORMULARIO--->
    <form action="enviar.php" method="post" >
    <label for="firstName">Elegiste la Carrera:</label>
    <select class="form-control" name="carreras" id="carreras" >
    <?php
foreach($car as $fila):
?>
<OPTION value="<?php echo $fila[0];?>"><?php echo $fila[1]; ?></OPTION>
    </select>
    <?php endforeach; ?>
    </div>
    <div class="col-2">
    <label for="firstName">Ciclo Lectivo:</label>
    <select class="form-control" name="ciclos" id="ciclos" >
    <option value="<?php echo $_POST['ciclos'];?>"><?php echo $ciclos;?> </option>
    </select>
      </div> 
      <!--cierro row -->
    <div class="col-2">
    <label for="date">Fecha De Incripcion</label>
    <input type="date" class="form-control" id="fecha"  name="fecha" value="<?php echo  $_POST['fecha'];?>" >
    </div> 
    <div class="col-3">
    <label for="firstName">DNI Alumno:</label>
    <input type="text" class="form-control"  name="dni" id="dni" required>
    <div class="invalid-feedback">
    </div>
    <div class="row">
    <div class="col">
    <div class="d-flex justify-content-end">
    <!-- retorno el motodo --->
    <button  type="submit" class="btn btn-info"  data_id="1" onclick="agregarDatos()"> <i class="fas fa-save"></i> Registrar</button>
</form>
    <div class="col">
    <button  class="btn btn-danger" onclick="location.href='../../menu.php'" name="cancelar" > <i class="fas fa-home"></i> Cancelar</button>
    </div></div></div></div></div>
    </div>  <!--cierro container -->
        <!--ACA IMPRIMO LA TABLA--> 
<div class="row">
<div class="col-sm-12">
<table class="table table-hover table-condensed table-bordered">
<thead>
<tr class="bg-info">
    <td>DNI</td>
    <td>Apellido</td>
		<td>Nombre</td>
		<td>Eliminar</td>
		</tr>
		</thead>
		<tbody>
		<?php 	
conectar(); 

while($ver=mysqli_fetch_row($result)){ 
			$datos=$ver[0]."||".
						 $ver[1]."||".
             $ver[2]."||".
             $ver[3];

      $id=$ver[0];
		?>
		<tr>
		<td><?php echo $ver[1] ?></td>
		<td><?php echo $ver[2] ?></td>
		<td><?php echo $ver[3] ?></td>
    <td ><button data_id="1" class="btn btn-danger fas fa-trash" onclick="preguntarSiNo('<?php echo $ver[0] ?>')" > 
     </button></td>
		<?php }?>
		</tr>
		</tbody>
		</table>
    </div></div></div></div></div></div></div></div>
</body>
</html>



<script>
function agregarDatos()
{
   var carreras=$('#carreras').val();
   var ciclos=$('#ciclos').val();
	var fecha=$('#fecha').val();
	var dni=$('#dni').val();
alert(cadena);
cadena="carreras=" + carreras +"&ciclos=" + ciclos +"&fecha=" + fecha + "&dni=" + dni;
$.ajax({
    type:"POST",
    url:"guardar.php",
   data:cadena,
    success:function(r){
     
        if(r==1){
            alertify.success("agregado con exito :)");  
        }else{
         
        }
    }
});

}
</script>