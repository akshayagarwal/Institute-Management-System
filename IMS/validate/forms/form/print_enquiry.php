<?php
require('fpdf.php');

include "dbinst.php";
$id=$_POST['id'];

$query="SELECT ADDRESS1,ADDRESS2,ADDRESS3,PINCODE,FNAME,MNAME,LNAME,COURSE,BATCH FROM enquiries WHERE ID='$id'";
$results=mysql_query($query);
list($address1,$address2,$address3,$pincode,$fname,$mname,$lname,$course,$batch)=mysql_fetch_row($results);

$query="SELECT START,END FROM batches WHERE ID='$batch'";
$results=mysql_query($query);
list($start,$end)=mysql_fetch_row($results);

$query="SELECT DURATION,FEES,CONTENTS FROM courses WHERE NAME='$course'";
$results=mysql_query($query);
list($duration,$fees,$course_contents)=mysql_fetch_row($results);

$name=$fname." ".$mname." ".$lname;
$salutation="Dear ".$fname." ,";
$contents1="Welcome to Sunny Computers! We are glad to provide you our course details. At Sunny Computers,You";
$contents2="will be a part of the finest IT community in the region. We provide world class computer education equipped with";
$contents3="the latest in technology.";
$contents4="Your enquiry details are as follows :-";
$details1="Enquiry ID: $id ";
$details2="Course: $course";
$details3="Course Contents: $course_contents";
$details4="Course Duration: $duration";
$details5="Course Fees: $fees";
$details6="Preferred Batch: $batch";
$details7="Batch Timings: $start to $end";
$ending3="Kindly make your admission at the earliest to ensure admission in your preferred batch";
$ending1="We look forward to an exciting & fulfilling academic relationship with you.";
$ending2="Thankyou for enquiring with us!";
$signature="For Sunny Computers,\nYaval";
$date="Date: ".date("D, d F Y");

class PDF extends FPDF
{
//Page header
function Header()
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
}

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
$pdf->SetFont('Times','',12);
$pdf->SetY(50);
$pdf->Cell(0,5,$name,0,1);
$pdf->Cell(0,5,$address1,0,1);
$pdf->Cell(0,5,$address2,0,1);
$pdf->Cell(0,5,$address3,0,1);
$pdf->Cell(0,5,'Pin-'.$pincode,0,1);
$pdf->SetY(90);
$pdf->Cell(0,10,$salutation,0,1);
$pdf->SetX(40);
$pdf->Cell(0,5,$contents1,0,1);
$pdf->Cell(0,5,$contents2,0,1);
$pdf->Cell(0,5,$contents3,0,1);
$pdf->SetY(120);
$pdf->Cell(0,5,$contents4,0,1);
$pdf->SetY(130);
$pdf->SetX(50);
$pdf->SetFont('Times','U',12);
$pdf->Cell(0,5,$details1,0,1);
$pdf->SetY(140);
$pdf->SetFont('Times','',12);
$pdf->SetX(50);
$pdf->Cell(0,5,$details2,0,1);
$pdf->SetX(50);
$pdf->Cell(0,5,$details3,0,1);
$pdf->SetX(50);
$pdf->Cell(0,5,$details4." months",0,1);
$pdf->SetX(50);
$pdf->Cell(0,5,$details5." Rs.",0,1);
$pdf->SetY(160);
$pdf->SetX(50);
$pdf->Cell(0,5,$details6,0,1);
$pdf->SetX(50);
$pdf->Cell(0,5,$details7,0,1);
$pdf->SetY(215);
$pdf->Cell(0,5,$ending3,0,1);
$pdf->SetY(220);
$pdf->Cell(0,5,$ending1,0,1);
$pdf->Cell(0,5,$ending2,0,1);
$pdf->SetY(260);
$pdf->SetX(140);
$pdf->Cell(0,5,$signature,0,1);
$pdf->Output();
?>