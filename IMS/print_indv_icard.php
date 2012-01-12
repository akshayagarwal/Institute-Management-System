<?php
require('fpdf.php');

include "dbinst.php";
$id=$_GET['id'];

$query="SELECT PID,ADDRESS1,ADDRESS2,ADDRESS3,PINCODE,FNAME,MNAME,LNAME,COURSE,BATCH,PASSWORD,MOBILE FROM students WHERE ID='$id'";
$results=mysql_query($query);
list($pid,$address1,$address2,$address3,$pincode,$fname,$mname,$lname,$course,$batch,$password,$mobile)=mysql_fetch_row($results);
$naam=$fname." ".$lname;

class PDF extends FPDF
{
//Page header


//Page footer
function Footer()
{
    //Position at 1.5 cm from bottom
    $this->SetY(-15);
    //Arial italic 8
    $this->SetFont('Arial','I',8);
    //Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

//Instanciation of inherited class
$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',15);
$pdf->SetY(10);
$pdf->SetX(15);
$pdf->Cell(80,60,'',1);
$pdf->SetY(10);
$pdf->SetX(35);
$pdf->Cell(0,5,'Sunny Computers',0);
$pdf->SetY(15);
$pdf->SetX(43);
$pdf->SetFont('Times','U',10);
$pdf->Cell(0,5,'Identity Card',0);
$pdf->SetY(20);
$pdf->SetX(15);
$pdf->SetFont('Times','',11);
$pdf->Cell(0,5,'Name :',0);
$pdf->SetFont('Times','U',11);
$pdf->SetX(29);
$pdf->Cell(0,5,$naam,0);
$pdf->SetY(28);
$pdf->SetX(19);
$pdf->Cell(22,30,'',1);
$pdf->SetY(40);
$pdf->SetX(19);
$pdf->Cell(0,5,'Photograph',0);
$pdf->SetY(30);
$pdf->SetX(41);
$pdf->SetFont('Times','',11);
$pdf->Cell(0,5,'Reg. ID : ',0);
$pdf->SetFont('Times','U',11);
$pdf->SetX(56);
$pdf->Cell(0,5,$id,0);
$pdf->SetY(35);
$pdf->SetX(41);
$pdf->SetFont('Times','',11);
$pdf->Cell(0,5,'Course : ',0);
$pdf->SetFont('Times','U',11);
$pdf->SetX(56);
$pdf->Cell(0,5,$course,0);
$pdf->SetY(40);
$pdf->SetX(41);
$pdf->SetFont('Times','',11);
$pdf->Cell(0,5,'Batch : ',0);
$pdf->SetFont('Times','U',11);
$pdf->SetX(56);
$pdf->Cell(0,5,$batch,0);
$pdf->SetY(45);
$pdf->SetX(41);
$pdf->SetFont('Times','',11);
$pdf->Cell(0,5,'Mobile : ',0);
$pdf->SetFont('Times','U',11);
$pdf->SetX(56);
$pdf->Cell(0,5,$mobile,0);
$pdf->SetY(50);
$pdf->SetX(41);
$pdf->SetFont('Times','',11);
$pdf->Cell(0,5,'Blood Gr. : ',0);
$pdf->SetY(63);
$pdf->SetX(15);
$pdf->SetFont('Times','',11);
$pdf->Cell(0,5,'Authorised Sign',0);
$pdf->SetX(63);
$pdf->SetFont('Times','',11);
$pdf->Cell(0,5,'Student Sign.',0);







$pdf->Output();
?>