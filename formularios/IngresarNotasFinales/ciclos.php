<?php

$conexion = mysqli_connect("localhost","root","","Instituto");

$las_carreras = $_POST['carrerasE'];

$query = $conexion->query("SELECT aniolectivo FROM cicloLectivo WHERE ID_Carrera = $las_carreras");

 //muestro el año y guardo el año en la base de datos
while ( $row = $query->fetch_assoc() )
{
	echo '<option value="'. $row['anioCarrera']. '">' . $row['anioCarrera'] . '</option>' . "\n";
 
}



