<?php

$conexion = mysqli_connect("localhost","root","","Instituto");

$las_carreras = $_POST['carrerasE'];


$query = $conexion->query("SELECT * FROM materias WHERE ID_Carrera = 1 AND anio_materia=1)");

 //muestro el año y guardo el año en la base de datos
while ( $row = $query->fetch_assoc() )
{
	echo '<option value="'. $row['ID_Materia']. '">' . $row['nombre_materia'] . '</option>' . "\n";
 
}


