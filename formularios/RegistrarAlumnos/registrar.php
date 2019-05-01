<?php
require '../../scripts/Funciones.php';
conectar();

    $conexion = mysqli_connect('localhost', 'root', '', 'Instituto');
    mysqli_set_charset($conexion, 'utf8');



    if (!empty($_POST["dni"])) 
	{
$dni=            strip_tags($_POST["dni"]);
$nombre=         strip_tags($_POST["nombre"]);
$apellido=       strip_tags($_POST["apellido"]);
$fecha=          strip_tags($_POST["fecha"]);
$lugar=          strip_tags($_POST["lugar"]);
$correo=         strip_tags($_POST["correo"]);
$tel=            strip_tags($_POST["tel"]);
$calle=          strip_tags($_POST["calle"]);
$numero=         strip_tags($_POST["numero"]);
$piso=           strip_tags($_POST["piso"]);
$dto=            strip_tags($_POST["dto"]);
$provincia=      strip_tags($_POST["provincia"]); 
$localidad=      strip_tags($_POST["localidad"]); 
$secundaria=     htmlspecialchars($_POST["secundaria"]);
$titulo=         strip_tags($_POST["titulo"]);
$trabajo=        strip_tags($_POST["trabajo"]);
$lugarN=         strip_tags($_POST["lugarN"]);
$obra=           strip_tags($_POST["obra"]);

//busco si el alumno ya esta registrado
$sql="SELECT * FROM alumnos WHERE DNI=$dni";
$result=mysqli_query($conexion,$sql);
//cuento las filas devueltas...
$fila= mysqli_num_rows($result);

if($fila==1)
{  
 echo"<script type=\"text/javascript\">alert('Error!! El DNI ya se encuentra Registrado'); window.location='registro-alumno.php';</script>"; 
}
else{

    $insertarAlumnos= "INSERT INTO alumnos (DNI,apellido,nombre,fecha_nacimiento,telefono,email,calle,nro,dpto,piso,ID_Localidad,trabaja,lugar_trabajo,obra_social,titulo_secundario,escuela_secundaria,lugar_nacimiento) 
    VALUES ('$dni','$apellido','$nombre','$fecha','$tel','$correo','$calle','$numero','$dto','$piso','$localidad','$trabajo','$lugar','$obra','$titulo','$secundaria','$lugarN')";
    
    $resultado = mysqli_query($conexion,$insertarAlumnos);
    }

 }



?>
