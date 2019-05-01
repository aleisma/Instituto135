<?php
require '../../scripts/Funciones.php';
conectar();
    $conexion = mysqli_connect('localhost', 'root', '', 'Instituto');
    mysqli_set_charset($conexion, 'utf8');
    if(!empty($_POST['carrera'])){
$carrera=        $_POST["carrera"];
$resolucion=     $_POST["resolucion"];
$duracion=       $_POST["duracion"];
//REGISTRO CARRERA
$resultado = mysqli_query($conexion,"INSERT INTO carreras (nombre_carrera,reslucion,duracion_anios) VALUES ('$carrera','$resolucion','$duracion')");
//inicializo los contadores
}
if(!empty($_POST['tecnicatura'])){
    $ciclos=              $_POST["ciclos"];
    $tecnicatura=         $_POST["tecnicatura"];
    $tiempo=              $_POST["tiempo"];
    $c2=0;
    $c3=0;
    $c4=0;
    
    $uno=1;
    $dos=2;
    $tres=3;
    $cuatro=4;
    
    $c1=$ciclos+1;
    $c2=$ciclos+2;
    $c3=$ciclos+3;
    
switch($tiempo){

case 1:$sql1=mysqli_query($conexion,"INSERT INTO ciclolectivo (ID_Ciclo,aniolectivo,anioCarrera,ID_Carrera) VALUES (null,'$ciclos','$uno','$tecnicatura')");
       break; 
case 2:$sql1=mysqli_query($conexion,"INSERT INTO ciclolectivo (ID_Ciclo,aniolectivo,anioCarrera,ID_Carrera) VALUES (null,'$ciclos','$uno','$tecnicatura')");
       $sql2=mysqli_query($conexion,"INSERT INTO ciclolectivo (ID_Ciclo,aniolectivo,anioCarrera,ID_Carrera) VALUES (null,'$c1','$dos','$tecnicatura')");
       break;
case 3: $sql1=mysqli_query($conexion,"INSERT INTO ciclolectivo (ID_Ciclo,aniolectivo,anioCarrera,ID_Carrera) VALUES (null,'$ciclos','$uno','$tecnicatura')");
        $sql2=mysqli_query($conexion,"INSERT INTO ciclolectivo (ID_Ciclo,aniolectivo,anioCarrera,ID_Carrera) VALUES (null,'$c1','$dos','$tecnicatura')");
        $sql3=mysqli_query($conexion,"INSERT INTO ciclolectivo (ID_Ciclo,aniolectivo,anioCarrera,ID_Carrera) VALUES (null,'$c2','$tres','$tecnicatura')");
        break;
case 4:$sql1=mysqli_query($conexion,"INSERT INTO ciclolectivo (ID_Ciclo,aniolectivo,anioCarrera,ID_Carrera) VALUES (null,'$ciclos','$uno','$tecnicatura')");
       $sql2=mysqli_query($conexion,"INSERT INTO ciclolectivo (ID_Ciclo,aniolectivo,anioCarrera,ID_Carrera) VALUES (null,'$c1','$dos','$tecnicatura')");
       $sql3=mysqli_query($conexion,"INSERT INTO ciclolectivo (ID_Ciclo,aniolectivo,anioCarrera,ID_Carrera) VALUES (null,'$c2','$tres','$tecnicatura')");
       $sql3=mysqli_query($conexion,"INSERT INTO ciclolectivo (ID_Ciclo,aniolectivo,anioCarrera,ID_Carrera) VALUES (null,'$c3','$cuatro','$tecnicatura')");
        break;
default:
echo "0";
break;

}

}
if(!empty($_POST['carreras'])){
//Agrego las materias ...
$materia=     $_POST["materia"];
$carreras=    $_POST["carreras"];
$anio=        $_POST["anio"];
$sql="INSERT INTO materias (nombre_materia,anio_materia,ID_Carrera) VALUES('$materia','$anio','$carreras')";
$result=mysqli_query($conexion,$sql);

}

?>

