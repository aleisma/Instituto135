<?php


$conexion = mysqli_connect("localhost","root","","Instituto");

$query = $conexion->query("SELECT * FROM carreras");

echo '<option value="0">Seleccione Carrera </option>';

while ( $row = $query->fetch_assoc() )
{
	echo '<option value="' . $row['ID_Carrera'].'">' . $row['nombre_carrera'] . '</option>' . "\n";
}


$carrerasL=$row['ID_Carrera'];


?>