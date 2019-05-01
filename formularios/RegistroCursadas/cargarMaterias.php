<?php 
require '../../scripts/Funciones.php';
//ya elegi carrera
//cargo las materias
conectar();
$materias=getMaterias($_POST['id_carrera'],$_POST['chekradio']);
desconectar();
foreach($materias as $fila):
   
	$html.="<OPTION value=".$fila[0].">".$fila[1]."</OPTION>";
endforeach; 
echo  $html;

?>
	