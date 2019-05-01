
<?php
include '../plantilla.php';
require 'Funciones.php';
conectar();


if(!empty($_POST['carreras'])){ 

$ciclo=   $_POST['ciclos']; 
$carrera= $_POST['carreras']; 
	

$query="SELECT a.DNI, a.apellido, a.nombre,a.fecha_nacimiento, a.lugar_nacimiento , a.calle, a.nro,l.Nombre, a.telefono,a.email,a.titulo_secundario, a.escuela_secundaria 
        FROM inscripciones i 
        INNER JOIN alumnos a ON a.DNI=i.DNI 
        INNER JOIN localidades l ON a.ID_Localidad=l.ID_Localidad
        INNER JOIN cicloLectivo c
        on c.aniolectivo=i.Ciclolectivo AND i.ID_Carrera=c.ID_Carrera 
        WHERE i.ID_Carrera=$carrera AND i.Ciclolectivo=$ciclo";

$sql="SELECT nombre_carrera FROM carreras WHERE ID_Carrera=$carrera";

$result= mysqli_query($conexion,$query);
$nombrecarrera=mysqli_query($conexion,$sql);

$pdf= new PDF('L','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Image('1.jpg',15,10,-220);
$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial','B',12);

while($row1=$nombrecarrera->fetch_assoc()){ 

$pdf->Cell(40,10,'Alumnos Inscriptos en la Carrera: '.$row1['nombre_carrera'],0,1,'L');
$pdf->ln(3);
   }

$pdf->Cell(19,5,'Dni',1,0,'',1);
$pdf->Cell(23,5,'Apellido',1,0,'',1);
$pdf->Cell(23,5,'Nombre',1,0,'',1);
$pdf->Cell(12,5,'Edad',1,0,'',1);
$pdf->Cell(23,5,'Calle',1,0,'',1);
$pdf->Cell(11,5,'Nro.',1,0,'',1);
$pdf->Cell(23,5,'Lugar Nac.',1,0,'',1);
$pdf->Cell(22,5,'Localidad',1,0,'',1);
$pdf->Cell(23,5,'Tel.',1,0,'',1);
$pdf->Cell(37,5,'Email',1,0,'',1);
$pdf->Cell(33,5,'Titulo',1,0,'',1);
$pdf->Cell(27,5,'Escuela Sec.',1,0,'',1);
$pdf->Ln(5);

$pdf->SetFont('Arial','',12);
while($row=$result->fetch_assoc()){ 
$cumpleaños= new DateTime($row['fecha_nacimiento']);
$hoy= new DateTime();
$anio=$hoy->diff($cumpleaños);

        $pdf->Cell(19,5,$row['DNI'],1,0,'C');
        $pdf->Cell(23,5,$row['apellido'],1,0,'C');
        $pdf->Cell(23,5,$row['nombre'],1,0,'C');
        $pdf->Cell(12,5,$anio->y,1,0,'');
        $pdf->Cell(23,5,$row['calle'],1,0,'C');
        $pdf->Cell(11,5,$row['nro'],1,0,'');
        $pdf->Cell(23,5,$row['lugar_nacimiento'],1,0,'C');
        $pdf->Cell(22,5,$row['Nombre'],1,0,'C');
        $pdf->Cell(23,5,$row['telefono'],1,0,'C');
        $pdf->Cell(37,5,$row['email'],1,0,'C');
        $pdf->Cell(33,5,$row['titulo_secundario'],1,0,'C');
        $pdf->Cell(27,5,$row['escuela_secundaria'],1,0,'C');
        $pdf->Ln();
}


$pdf->Output('');

}
else{ 
        echo "<script> alert (\"Eliga Una Carrera\"); </script>"; 
        echo "<script language=Javascript> location.href=\"Alumnos.php\"; </script>"; 
        die(); 
}

?>

