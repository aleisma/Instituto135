<?php
require '../../../scripts/Funciones.php';
include '../plantilla.php';
conectar();


//ACA RECOLECTO LOS DATOS DEL FORMULARIO...
$ciclos=     $_POST['ciclos'];
$materias=   $_POST['materias'];
$ins=        $_POST['ins'];
    $conexion = mysqli_connect('localhost', 'root', '', 'Instituto');
    mysqli_set_charset($conexion, 'utf8');

    $profesor=getProfesores();
    $final=ReporteFinales($materias,$ins,$ciclos);
    $car=NombreCarrera($materias);

$pdf= new PDF('L','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Image('1.jpg',15,10,-220);
$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial','B',12);

foreach($car as $row1):
$pdf->Cell(40,5,'Carrera: '.utf8_decode($row1[1]),0,1,'L');
$pdf->Cell(40,10,'Materia: '.utf8_decode($row1[0]),0,1,'L');
endforeach;
$pdf->Cell(40,5,'Fecha del Final: '.utf8_decode($ins),0,1,'L');
$pdf->ln(3);

$pdf->Cell(27,5,'Dni',1,0,'',1); 
$pdf->Cell(33,5,'Apellido',1,0,'',1);
$pdf->Cell(33,5,'Nombre',1,0,'',1); 
$pdf->Cell(53,5,'Profesor Titular',1,0,'',1);
$pdf->Cell(32,5,'Anio Lectivo',1,0,'',1);
$pdf->Cell(27,5,'Nota',1,0,'',1);
$pdf->Ln(5);
//imprimo los de la BD
//me.ciclo_lectivo 0, me.DNI 1,me.nota 2,al.apellido 3,al.nombre 4,p.nombre 5,p.apellido 6
foreach($final as $row): 
$pdf->SetFont('Arial','',12);
$pdf->Cell(27,5,$row[1],1,0,'C');
$pdf->Cell(33,5,$row[3],1,0,'C');
$pdf->Cell(33,5,$row[4],1,0,'C');
$pdf->Cell(53,5,$row[6]." ".$row[5],1,0,'C');
$pdf->Cell(32,5,$row[0],1,0,'C');
$pdf->Cell(27,5,$row[2],1,0,'C');

$pdf->Ln();
endforeach; 
$pdf->Output('');


?>
