
<?php

$conexion=null;

function conectar()
{
       global $conexion;
       $conexion=mysqli_connect('localhost','root','','Instituto')
       or die ("no se puede conectar");
       mysqli_set_charset($conexion,'utf8');
}


function haIniciadoSesion()
  {
    session_start();
    return isset( $_SESSION['usuario'] );
  }

function validarLogin($usuario, $clave) //valido seccion
{
		global $conexion;
		$consulta = "SELECT * FROM usuarios WHERE usuario='".$usuario."' AND clave='".$clave."'" ;
		$respuesta = mysqli_query($conexion, $consulta);
		
		if( $fila = mysqli_fetch_row($respuesta) )
		{
			session_start();
			$_SESSION['usuario'] = $usuario;
			$_SESSION['admin'] = $fila[2];
			return true;
		}
		return false;
}
function esAdmin()
{
		return $_SESSION['admin'];
	}

function desconectar()		
{
		global $conexion;
		mysqli_close($conexion);
		
   }
function getProfesores()
{
	global $conexion;
	$listado=mysqli_query($conexion,'SELECT ID_Profesor,apellido, nombre FROM profesores');
	return $listado->fetch_all();
	
} 
function getLocalidades()
{
	global $conexion;
	$listado=mysqli_query($conexion,'SELECT ID_Localidad, nombre FROM localidades');
	return $listado->fetch_all();
	
}
//Obtengo los alumnos inscriptos por carrera...
function getAlumnosCarreras($idcarrera,$aniolectivo)
{
	global $conexion;
	global $listado;
	$listado=mysqli_query($conexion,"SELECT a.DNI, a.apellido, a.nombre FROM inscripciones i 
	                                 INNER JOIN alumnos a ON a.DNI=i.DNI INNER JOIN cicloLectivo c 
									 on c.aniolectivo=i.Ciclolectivo AND i.ID_Carrera=c.ID_Carrera 
									 WHERE i.ID_Carrera=".$idcarrera." AND i.Ciclolectivo=".$aniolectivo."");
	return $listado->fetch_all();
} 
//esto es lo nuevo
function getCarreras()
{
	global $conexion;
	$listado=mysqli_query($conexion,'SELECT * FROM carreras');
	return $listado->fetch_all();
}
function getMaterias($cod_tec,$anio)
{
	global $conexion;
	$sql="select * from materias where ID_carrera=".$cod_tec. " and anio_materia=".$anio;
	$listado=mysqli_query($conexion,$sql);
	return $listado->fetch_all();
	
}
function getCicloLectivo()
{
	global $conexion;
	$listado=mysqli_query($conexion,"SELECT * FROM cicloLectivo");
	return $listado->fetch_all();	
}

?>



