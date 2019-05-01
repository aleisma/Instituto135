<?php
include '../plantilla.php';
require 'Funciones.php';

conectar();
$carreras=      $_POST['carreras']; 
$fecha=         $_POST['fecha']; 
$ca=mysqli_query($conexion,"SELECT nombre_carrera FROM carreras WHERE ID_Carrera=$carreras");            

$query="SELECT ID_Salidas,nombre,apellido,DNI,tipo,fecha  FROM salidas  WHERE ID_Carrera='$carreras' AND fecha='$fecha'";
$result= mysqli_query($conexion,$query);
$pdf= new PDF('L','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Image('1.jpg',10,10,-250);
$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(38,5,'Fecha: '.$fecha,1,0,'',0);
           $pdf->Ln(5);
while($row1=$ca->fetch_assoc()){ 

        $pdf->Cell(40,10,'Salida Educativa Carrera: '.$row1['nombre_carrera'],0,1,'L');
        $pdf->ln(3);
           }
$pdf->Cell(33,5,'Dni',1,0,'',1);        
$pdf->Cell(35,5,'Apellido',1,0,'',1);
$pdf->Cell(35,5,'Nombre',1,0,'',1);
$pdf->Cell(35,5,'Tipo',1,0,'',1);
$pdf->Ln(5);

$pdf->SetFont('Arial','',12);
while($row=$result->fetch_assoc()){ 
        $pdf->Cell(33,5,$row['DNI'],1,0,'');
        $pdf->Cell(35,5,$row['apellido'],1,0,'C');
        $pdf->Cell(35,5,$row['nombre'],1,0,'');
        $pdf->Cell(35,5,$row['tipo'],1,0,'C');
        $pdf->Ln();
}
$pdf->Output();




?>
