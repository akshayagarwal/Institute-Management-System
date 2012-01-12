<?php
require('fpdf.php');

$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Times','B',16);
$pdf->Cell(40,10,'Sunny Computers,Yaval');
$pdf->Cell(50,20,'World Class IT education');
$pdf->Output();
?>