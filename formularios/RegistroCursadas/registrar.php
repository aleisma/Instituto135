<?php 
require '../../scripts/Funciones.php';
conectar();



$dni=           $_POST["dni"];
$anio=           $_POST["anio"];
$materias=       $_POST["materias"];
$nota=           $_POST["nota"];
$tipo=           $_POST["tipo"];
$profesores=     $_POST["profesores"];
$asistencia=     $_POST["asistencia"];
$fecha=          $_POST["fecha"]; 

 $query= "INSERT INTO cursadas (ciclo_lectivo,ID_Materia,DNI,nota,tipo,ID_Profesor,asistencia,fecha_Aprobacion)
VALUES ('$anio','$materias','$dni','$nota','$tipo','$profesores','$asistencia','$fecha')";
$result= mysqli_query($conexion,$query); 


?>


 