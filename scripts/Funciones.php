
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


function validarLogin($usuario, $pass) //valido seccion
{
		global $conexion;
		$consulta = "SELECT * FROM usuarios WHERE usuario='".$usuario."' AND clave='".$pass."'" ;
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
function getFinales($materias,$ins,$ciclos)
{
	global $conexion;
	$listado=mysqli_query($conexion,"SELECT m.nombre_materia,me.fecha_inscripcion,me.ciclo_lectivo,me.DNI FROM
	                                  mesasexamenes me INNER JOIN materias m ON m.ID_Materia = me.ID_Materia WHERE
	                               me.ID_Materia = $materias AND me.fecha_inscripcion = '$ins' AND me.ciclo_lectivo =$ciclos");
	return $listado->fetch_all();
	
}


//reportes de actas

function ReporteFinales($materias,$ins,$ciclos)
{
	global $conexion;
	$listado=mysqli_query($conexion,"SELECT  me.ciclo_lectivo, me.DNI,me.nota,al.apellido,al.nombre,p.nombre,p.apellido
	                      FROM mesasexamenes me INNER JOIN materias m ON m.ID_Materia = me.ID_Materia INNER JOIN profesores p ON
	                       p.ID_Profesor=me.profesor_titular INNER JOIN alumnos al ON al.DNI=me.DNI
	                      WHERE me.ID_Materia ='$materias' AND me.fecha_inscripcion = '$ins' AND me.ciclo_lectivo = '$ciclos'");
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
	$listado=mysqli_query($conexion,'SELECT DISTINCT * FROM carreras');
	return $listado->fetch_all();
}


function carrerasSelect($car)
{
	global $conexion;
	$listado=mysqli_query($conexion,"SELECT ID_Carrera,nombre_carrera FROM carreras WHERE ID_Carrera=$car");
	return $listado->fetch_all();
}

function getMaterias($cod_tec,$anio)
{
	global $conexion;
	$sql="select * from materias where ID_carrera=".$cod_tec. " and anio_materia=".$anio;
	$listado=mysqli_query($conexion,$sql);
	return $listado->fetch_all();
	
}


function NombreCarrera($materias)
{
	global $conexion;
	$sql="SELECT m.nombre_materia, ca.nombre_carrera FROM materias m INNER JOIN carreras ca ON
		  ca.ID_Carrera = m.ID_Carrera WHERE m.ID_Materia='$materias'";
	$listado=mysqli_query($conexion,$sql);
	return $listado->fetch_all();
	
}

function Materias($materias)
{
	global $conexion;
	$sql="SELECT ID_Materia,nombre_materia FROM materias WHERE ID_Materia='$materias'";
	$listado=mysqli_query($conexion,$sql);
	return $listado->fetch_all();
	
}

function getCicloLectivo()
{
	global $conexion;
	$listado=mysqli_query($conexion,"SELECT * FROM cicloLectivo");
	return $listado->fetch_all();	
}

function getMateriasFinales($dni)
  {
    global $conexion;
    $respuesta = mysqli_query($conexion, "SELECT c.ID_Materia,m.nombre_materia,m.anio_materia FROM cursadas c
	INNER JOIN materias m ON c.ID_Materia = m.ID_Materia WHERE c.DNI =$dni AND c.nota >=4 AND c.asistencia>=60");
     return $respuesta->fetch_all();
    $respuestas_array = array();
   while ($fila = $respuesta->fetch_row())
      $respuestas_array[] = $fila;
    return $respuestas_array;   
  }

  function getMateriasLibres($dniL)
  {
    global $conexion;
    $respuesta = mysqli_query($conexion, "SELECT DISTINCT c.ID_Materia,m.nombre_materia,m.anio_materia FROM cursadas c
	INNER JOIN materias m ON c.ID_Materia = m.ID_Materia WHERE c.DNI =$dniL");
     return $respuesta->fetch_all();
    $respuestas_array = array();
   while ($fila = $respuesta->fetch_row())
      $respuestas_array[] = $fila;
    return $respuestas_array;   
  }



?>


