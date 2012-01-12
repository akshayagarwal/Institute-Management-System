<?php
require('fpdf.php');

include "dbinst.php";

$course=$_POST['course'];
$dd1=$_POST['dd1'];
$mm1=$_POST['mm1'];
$yyyy1=$_POST['yyyy1'];
$dd2=$_POST['dd2'];
$mm2=$_POST['mm2'];
$yyyy2=$_POST['yyyy2'];

$start=mktime(01,01,01,$mm1,$dd1,$yyyy1);
$end=mktime(01,01,01,$mm2,$dd2,$yyyy2);

$query="SELECT ADDRESS1,ADDRESS2,ADDRESS3,PINCODE,FNAME,MNAME,LNAME,BATCH,MOBILE FROM students WHERE COURSE='$course' AND TIME>$start AND TIME<$end";
$results=mysql_query($query);

class PDF extends FPDF
{
//Page header
/*function Header()
{
    //Logo
    //$this->Image('logo_pb.png',10,8,33);
    //Arial bold 15
    $this->SetFont('Arial','B',15);
    //Move to the right
    $this->Cell(60);
    //Title
    $this->Cell(80,10,'Sunny Computers | Yaval',0,0,'C');
    //Line break
    $this->Ln(20);
}*/

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

$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();    
$pdf->SetFont('Times','',12);
$ypos=10;
$pgcount=0;
while(list($address1,$address2,$address3,$pincode,$fname,$mname,$lname,$batch,$mobile)=mysql_fetch_row($results))
{
	if($pgcount>=4)
	{
		$pdf->AddPage();    
		$pdf->SetFont('Times','',12);
		$ypos=10;
		$pgcount=0;
	}
$pdf->SetY($ypos);
$pdf->SetX(15);
$pdf->Cell(80,40,'',1);
$name=$fname." ".$mname." ".$lname;
$pdf->SetY($ypos+5);
$pdf->SetX(15);
$pdf->Cell(0,5,$name,0,1);
$pdf->SetX(15);
$pdf->Cell(0,5,$address1,0,1);
$pdf->SetX(15);
$pdf->Cell(0,5,$address2,0,1);
$pdf->SetX(15);
$pdf->Cell(0,5,$address3,0,1);
$pdf->SetX(15);
$pdf->Cell(0,5,'Pin-'.$pincode,0,1);
$pdf->SetX(15);
$pdf->Cell(0,5,'Mob. No-'.$mobile,0,1);
$ypos=$ypos+60;
$pgcount++;
}
$pdf->Output();
?>