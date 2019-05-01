<?php 
require '../../scripts/Funciones.php';
conectar();

$dni=             $_POST["dni"];
$profesores=      $_POST["profesores"];
$nota=            $_POST["nota"];
$materias=        $_POST["materias"];

$q="SELECT * FROM mesasexamenes WHERE DNI='$dni' AND ID_Materia='$materias'";
$busqueda= mysqli_query($conexion,$q);
$fila= mysqli_num_rows($busqueda);
echo $fila;
if($fila==0)
 {  echo "error";
}
else{              

    //  ID_Materia
    $query= "UPDATE mesasexamenes SET nota='$nota', profesor_titular='$profesores' WHERE DNI='$dni' AND ID_Materia='$materias'";
    $result= mysqli_query($conexion,$query); 
}
?>