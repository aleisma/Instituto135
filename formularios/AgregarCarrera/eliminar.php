<?php
require '../../scripts/Funciones.php';
conectar();

$id=$_POST['id'];
$conexion = mysqli_connect('localhost', 'root', '', 'Instituto');
mysqli_set_charset($conexion, 'utf8');

$result=mysqli_query($conexion,"DELETE FROM materias WHERE ID_Materia='{$id}'");



if(!$result){
    echo 'Error';
    }
    else{  
       
    }
?>