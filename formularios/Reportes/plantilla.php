<?php
require '../pdf/fpdf.php';
class PDF extends FPDF
{
    function Header()
{

 
  $this->SetFont('Arial','B',14);
  $this->Cell(120);
  $this->Cell(20,5,'Reporte',0,0,'C');
  
  $this->Ln(20);
}



}  //CIERRO PDF
  
?>