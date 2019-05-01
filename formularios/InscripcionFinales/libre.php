<?php
 require '../../scripts/Funciones.php';
conectar();
//traigo todos los alumnos inscriptos por carrera segun el DNI
   $dniL=  $_POST['dniL'];

   $result=mysqli_query($conexion,"SELECT DISTINCT a.apellido,a.nombre,ca.nombre_carrera FROM inscripciones i
                        INNER JOIN alumnos a ON a.DNI = '$dniL'INNER JOIN cicloLectivo c ON 
                        c.aniolectivo = i.Ciclolectivo INNER JOIN carreras ca ON ca.ID_Carrera = c.ID_Carrera 
                        AND i.ID_Carrera = c.ID_Carrera");

//SELECCIONO las materias de cursada segun DNI...
$result1=mysqli_query($conexion,"SELECT c.ID_Materia,m.nombre_materia FROM cursadas c
                                INNER JOIN materias m ON c.ID_Materia = m.ID_Materia WHERE c.DNI ='$dniL' ");

$m1=getMateriasLibres($dniL)

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
    width: 35%;
}
</style>


<!----Aca registro los alumnos-------->
<script>  
function preguntarSiNo(materias,anio){
	alertify.confirm('Guardar Datos', '¿Desea Guardar Este Registro?', 
					function(){ agregarDatos(materias,anio) 
                    
                    
                        var notification = alertify.notify('Agregado con Exito!!', 'success', 5, function(){  console.log('dismissed'); });
                    }
                , function(){ 
                    alertify.error('Se Cancelo!!')});
                
}
</script>


  <title>Incripcion a Mesas Finales Modalidad Libre</title>

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


   <body class="bg-light">
    <div class="container">
      <div class="py-5 text-center">
      <div class="col-12 text-center">
      <img class="mb-12" src="../../imagenes/logos.png" width="500" height="100">
     <hr>
    </div>
    <div class="col-md-12 order-md-1 align-center">
    <h4 class="mb-3">Inscripcion Mesas Finales Modalidad Libre</h4>
    <div class="row ">
  <hr>
  
    <div class="col-2">   
    <br>   
    <button type="submit" class="btn btn-warning" onclick="location.href='inscripciones-finales.php'"><i class="fas fa-undo-alt"></i> Volver</button>
          
</div>     
<div class="col-2">
  <br>
<button  class="btn btn-danger" onclick="location.href='../../menu.php'" name="cancelar"> <i class="fas fa-home"></i> Cancelar</button>
    </div> </div>
   <?php 
   conectar();
   while($ver=mysqli_fetch_row($result)){ 
			$datos=
                     $ver[0]."||". //apellido
                     $ver[1]."||". //nombre
                     $ver[2];      //carrera

		?>
    <div class="container">

<div class="row">
<div class="col-7">
<div class="input-group mb-2">
<div class="input-group-prepend">
<span class="input-group-text" id="basic-addon1"><em><strong>Carrera:</strong></em> </span></div>
<input type="text" class="form-control" value="<?php echo $ver[2];?>" readonly>
</div></div>
</div>
<div class="row">
<div class="col-3">
<div class="input-group mb-2">
<div class="input-group-prepend">
<span class="input-group-text" id="basic-addon1"><em><strong>DNI:</strong></em> </span></div>
<input type="text" class="form-control" value="<?php echo $_POST['dniL'];?>" id="dniL" readonly>
</div></div>
<div class="col-3">
<div class="input-group mb-2">
<div class="input-group-prepend">
<span class="input-group-text" id="basic-addon1"><em><strong>Nombre:</strong></em>  </span></div>
<input type="text" class="form-control" value="<?php echo $ver[1];?>" readonly>
</div></div>
<div class="col-3">
<div class="input-group mb-2">
<div class="input-group-prepend">
<span class="input-group-text" id="basic-addon1"><em><strong>Apellido:</strong></em> </span></div>
<input type="text" class="form-control" value="<?php echo $ver[0];?>" readonly>
</div></div><?php }?></div>

<p><em> <u>Nota:</u> El alumno se encuentra habilitado para rendir las siguientes materias:</em></p>

</div>
<!--cierro container-->
<div class="row" >
<!---tabla fechas--->
<div class="col-sm-5" id="tabla">
<div class="scrollme">  
<div class="table-responsive">
<table class="table table-hover table-condensed table-bordered">
<thead>
<tr class="bg-info">
 <td>Fecha de final </td>
  <td>Fecha de inscripcion </td>     
		</tr>
		</thead>
		<tbody>
		<tr>
       <td class="t1"><input class="form-control" type="date" id="inicio" name="inicio"></td>
        <td class="t1"><input class="form-control" type="date" id="ins" name="ins"></td> 
	   
</tr></tbody>
		</table>
</div></div></div>
<!---tabla materias--->
<div class="col-sm-7" id="tabla2">
<div class="table-responsive">
<table class="table table-hover table-condensed table-bordered">
<thead>
<tr class="bg-info">
  <td>Materias</td>     
  <td>Año Lectivo</td>
  <td>Registrar</td>      
		</tr>
		</thead>
		<tbody>
		<tr>
    <?php 
   conectar();

   foreach($m1 as $dato):
		?>
      <td class="t3">  
    <select class="form-control" name="materias" id="materias" >
    <option value="<?php echo $dato[0];?>"> <?php echo $dato[1]; ?></option>
    </select>
    </td>
        <td class="t2"><input class="form-control"  disabled value="<?php echo $dato[2]; ?>" ></td>
        <?php 
        $materias=$dato[0];
        $anio=$dato[2];
        
        ?>
        <!---ESTE EL BOTON EN DONDE ENVIO LOS DATOS POR PARAMETRO----->
   <td class="t1" ><button class="btn btn-success" data_id="1" id="registrar"   onclick="preguntarSiNo(<?php echo $materias; ?>, <?php echo $anio; ?>)">
         <i class="fas fa-check-circle"> </i>         
     </button></td> </td>
</tr><?php endforeach ?> </tbody>
		</table>
    </div></div></div></div></div></div></div></div></div> 

<script>
//FUNCION PARA AGREGAR DATOS
function agregarDatos(materias,anio)
{
    var dniL=$('#dniL').val();
    var inicio=$('#inicio').val();
    var  ins=$('#ins').val();
    cadena="materias=" + materias +"&inicio=" + inicio +"&ins="+ ins+"&anio="+ anio +"&dniL="+ dniL;
alert(cadena);
$.ajax({
    type:"POST",
    url:"registrarL.php",
    data:cadena,
  
    success:function(r){
        if(r==0){ 
            alertify.success("agregado con exito :)");  
            var inicio=$('#inicio').val("");
          //  var inicio=$('#inicio').val("");
	        //var ins=$('#ins').val("");

        }else{
           // alertify.error("Fallo el servidor :(");
           var inicio=$('#inicio').val("");
	        //var ins=$('#ins').val("");
        }
    }
});

}
</script>
