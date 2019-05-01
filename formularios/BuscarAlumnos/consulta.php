
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  

<style>
/* DOY ESTILOS A LA TABLA */
.scrollme {
    overflow-y: auto;
}
table {
   width: 100%;
}
th, td {
   width: 100%;
   background: white;
    text-align: left;
   vertical-align: top;
   border: 1px solid #000;
}
</style>

</head>
<body>
    
</body>
</html>
<?php
/////// CONEXIÓN A LA BASE DE DATOS /////////
$host = 'localhost';
$basededatos = 'Instituto';
$usuario = 'root';
$contraseña = '';

$conexion = new mysqli($host, $usuario,$contraseña, $basededatos);
if ($conexion -> connect_errno)
{
	die("Fallo la conexion:(".$conexion -> mysqli_connect_errno().")".$conexion-> mysqli_connect_error());
}

//////////////// VALORES INICIALES ///////////////////////

$tabla="";
$query="SELECT * FROM alumnos ORDER BY DNI";

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['alumnos']))
{
	$q=$conexion->real_escape_string($_POST['alumnos']);
	$query="SELECT * FROM alumnos WHERE 
		DNI LIKE '%".$q."%' OR
		apellido LIKE '%".$q."%' OR
		nombre LIKE '%".$q."%'";
}

$buscarAlumnos=$conexion->query($query);
if ($buscarAlumnos->num_rows > 0)
{
    $tabla.= 
    '<div class="scrollme">  
    <div class="table-responsive">
    <table class="table table-hover table-condensed table-bordered">
		<tr class="table-success">
		    
			<td>Dni</td> 
			<td>Apellido</td>
			<td>Nombre</td>
			<td>Fecha Nac.</td>
			<td>Telefono</td>
            <td>Email</td>
            <td>Calle</td>
            <td>Nro.</td>
			<td>Piso</td>
            <td>Dto</td>
            <td>¿Trabaja?</td>
            <td>Lugar</td>
            <td>Obra</td>
            <td>Titulo</td>
            <td>Escuela Secundaria</td>
			<td>Lugar Nac.</td>
		</tr>';

	while($filaAlumnos= $buscarAlumnos->fetch_assoc())
	{
		$tabla.=
		'<tr>
			<td>'.$filaAlumnos['DNI'].'</td>
			<td>'.$filaAlumnos['apellido'].'</td>
			<td>'.$filaAlumnos['nombre'].'</td>
			<td>'.$filaAlumnos['fecha_nacimiento'].'</td>
			<td>'.$filaAlumnos['telefono'].'</td>
            <td>'.$filaAlumnos['email'].'</td>
            <td>'.$filaAlumnos['calle'].'</td>
            <td>'.$filaAlumnos['nro'].'</td>
			<td>'.$filaAlumnos['piso'].'</td>
			<td>'.$filaAlumnos['dpto'].'</td>
			<td>'.$filaAlumnos['trabaja'].'</td>
			<td>'.$filaAlumnos['lugar_trabajo'].'</td>
            <td>'.$filaAlumnos['obra_social'].'</td>
            <td>'.$filaAlumnos['titulo_secundario'].'</td>
            <td>'.$filaAlumnos['escuela_secundaria'].'</td>
			<td>'.$filaAlumnos['lugar_nacimiento'].'</td>
			
		 </tr>
		';
	}

	$tabla.='</table> </div> </div>';
} else
	{
		
	}


echo $tabla;
?>

