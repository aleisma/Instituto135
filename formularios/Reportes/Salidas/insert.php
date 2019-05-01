<?php 
require 'Funciones.php';
conectar();

if(isset($_POST['carreras'])){ 
    $carreras=      $_POST['carreras']; 
    $nombre=        $_POST['nombre']; 
    $apellido=      $_POST['apellido']; 
    $dni=           $_POST['dni']; 
    $tipo=          $_POST['tipo']; 
    $fecha=         $_POST['fecha']; 
    
    $sql="INSERT INTO salidas (ID_Carrera,nombre,apellido,DNI,tipo,fecha) VALUES ('$carreras','$nombre','$apellido','$dni','$tipo','$fecha')";
    $result=mysqli_query($conexion,$sql);
    
}
else{
desconectar();
}

?>