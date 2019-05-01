<?php 
require '../../scripts/Funciones.php';
conectar();

$materias=       $_POST["materias"];
$inicio=         $_POST["inicio"]; 
$ins=            $_POST["ins"];
$anio=           $_POST["anio"];
$dni=            $_POST["dniL"];
                               
// id_materia,aniolectivo,fecha_final,fecha de inscripcion 
 $query= "INSERT INTO mesasexamenes (ID_Materia,fecha_inscripcion,fecha_realizada_inscripcion,ciclo_lectivo,DNI)
VALUES ('$materias','$inicio','$ins','$anio','$dni')";
$result= mysqli_query($conexion,$query); 



?>
