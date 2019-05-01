<?php 
require '../../scripts/Funciones.php';
conectar();

$materias=       $_POST["materias"];
$inicio=         $_POST["inicio"]; 
$ins=            $_POST["ins"];
$anio=           $_POST["anio"];
$dni=            $_POST["dni"];

$query= "INSERT INTO mesasexamenes (ID_Materia,fecha_inscripcion,fecha_realizada_inscripcion,ciclo_lectivo,DNI)
VALUES ('$materias','$inicio','$ins','$anio','$dni')";
$result= mysqli_query($conexion,$query); 
mysqli_close($conexion);

//PARTE EN DESARROLLO:............
/*
     //COMPRUEBO LAS CORRELATIVAS                         
$sql=mysqli_query($conexion,"SELECT * FROM correlativas WHERE ID_Materia='$materias'");
//cuento las columnas
$respuesta=mysqli_num_rows($sql);
//echo $respuesta." tiene correlativas";
if($respuesta==0){
    $query= "INSERT INTO mesasexamenes (ID_Materia,fecha_inscripcion,fecha_realizada_inscripcion,ciclo_lectivo,DNI)
    VALUES ('$materias','$inicio','$ins','$anio','$dni')";
    $result= mysqli_query($conexion,$query); 
    mysqli_close($conexion);
 }

 else{ 
    conectar();
    while($ver=mysqli_fetch_row($sql)){ 
             $datos=
                      $ver[0]."||". //ID_Correlativa
                      $ver[1]."||". //ID_Materia
                      $ver[2];      //ID_Materia_Correlativa
                      $correlativa=$ver[2];
                      //traigo 2 filas

               //busca en la tabla cursadas si la materia correlativa esta aprobada...
               //se repite segun la cantidad de correlativas        
              $buscar="SELECT * FROM cursadas WHERE ID_Materia='$correlativa' AND nota>=4 AND asistencia>=60";
              $enc=mysqli_query($conexion,$buscar);
              $aprob=mysqli_num_rows($enc);
           echo $aprob;
            } 
            //si no encuentra ninguna materia::::
          if($aprob==0){
            echo"<script type=\"text/javascript\">alert('ERROR AL INSCRIBIR, CORRELATIVAS NO APROBADAS!!');</script>";
            mysqli_close($conexion);  
        }
           else{
            $result= mysqli_query($conexion,"INSERT INTO mesasexamenes (ID_Materia,fecha_inscripcion,fecha_realizada_inscripcion,ciclo_lectivo,DNI) VALUES ('$materias','$inicio','$ins','$anio','$dni')");
            mysqli_close($conexion);
         
              }        
  } //else general */
?>
<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../../../../favicon.ico">

  <title>Incripcion a Mesas Finales</title>
  <script src="../jquery/jquery.min.js"></script>
    <!-- Bootstrap core CSS -->
  <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- Custom styles for this template -->
  <link href="../../css/grid.css" rel="stylesheet">
   <body class="bg-light">
    <div class="container">
      <div class="py-5 text-center">
      <div class="col-12 text-center">
      <img class="mb-12" src="../../imagenes/logos.png" width="500" height="100">
     <hr>
    </div>
    <div class="col-md-12 order-md-1 align-center">
    <h4 class="mb-3">Inscripcion Mesas Finales</h4>
    <form action="enviar.php" method="POST">
    <div class="row ">
    <div class="col-2">
    <label for="firstName">DNI</label>
    <input type="text" class="form-control" id="dni" name="dni" maxlength="10" required>
    </div>
    <div class="col-4">   
    <br>   
    <button type="submit" class="btn btn-success"><i class="fas fa-search"></i> Buscar Alumno</button>
    <button  class="btn btn-danger" onclick="location.href='../../menu.php'" name="cancelar"> <i class="fas fa-home"></i> Cancelar</button>
    </div></form> 

<div class="col-2">
<label for="firstName"><strong>Modalidad Libre</strong></label>
<form action="libre.php" method="post">
<hr>
    <input type="text" class="form-control" id="dniL" name="dniL" maxlength="10" placeholder="Ingrese dni " required>
    <br>
<button class="btn btn-info" type="submit" ><i class="fas fa-search"></i> Buscar</button> 
</div>  </form> 
<!---
<div class="col-2">
    <label for="firstName"><strong>Libre (sin cursada)</strong> </label>
<form action="noCurso.php" method="post">
<hr>
    <input type="text" class="form-control" id="dniSc" name="dniSc" maxlength="10" placeholder="Ingrese dni " required>
    <br>
<button class="btn btn-dark" type="submit" ><i class="fas fa-save"></i> No  Curso</button> 
</div>  </form> -->

</div>
    
    <hr>
    
  </body>
</html>


