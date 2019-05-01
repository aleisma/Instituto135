<?php
 require '../../scripts/Funciones.php';

//ACA RECOLECTO LOS DATOS DEL FORMULARIO...
conectar();
  

	$ciclos=    $_POST['ciclos'];
	$carreras=  $_POST['carreras'];
	$dni=       $_POST['dni'];
  $fecha=     $_POST['fecha'];
  
  
//me conecto a la base de datos
    $conexion = mysqli_connect('localhost', 'root', '', 'Instituto');
  mysqli_set_charset($conexion, 'utf8');
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


?>