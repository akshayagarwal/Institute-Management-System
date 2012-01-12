<?php
require('fpdf.php');

include "dbinst.php";
$id=$_POST['id'];

$query="SELECT PID,ADDRESS1,ADDRESS2,ADDRESS3,PINCODE,FNAME,MNAME,LNAME,COURSE,BATCH,PASSWORD,MOBILE FROM students WHERE ID='$id'";
$results=mysql_query($query);
list($pid,$address1,$address2,$address3,$pincode,$fname,$mname,$lname,$course,$batch,$password,$mobile)=mysql_fetch_row($results);

$query="SELECT START,END FROM batches WHERE ID='$batch'";
$results=mysql_query($query);
list($start,$end)=mysql_fetch_row($results);

$query="SELECT DURATION,FEES,CONTENTS FROM courses WHERE NAME='$course'";
$results=mysql_query($query);
list($duration,$fees,$course_contents)=mysql_fetch_row($results);

$name=$fname." ".$mname." ".$lname;
$salutation="Dear ".$fname." ,";
$contents1="Welcome to Sunny Computers! We are glad to confirm your registration with us. You are now ";
$contents2="a part of the finest IT community in the region. We are proud to provide you world class computer education";
$contents3="equipped with the latest in technology.";
$contents4="Your registration details are as follows :-";
$details1="Registration ID: $id ";
$details2="Course: $course";
$details3="Course Contents: $course_contents";
$details4="Course Duration: $duration";
$details5="Course Fees: $fees";
$details6="Batch: $batch";
$details7="Batch Timings: $start to $end";
$details8="The following are details for accessing online resources :";
$details9="Username: $id";
$details10="Password: $password";
$ending1="We look forward to an exciting & fulfilling academic relationship with you.";
$ending2="Thankyou for registering with us!";
$signature="For Sunny Computers,\nYaval";
$date="Date: ".date("D, d F Y");
$naam=$fname." ".$lname;

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

//Instanciation of inherited class
$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFont('Arial','B',15);
    //Move to the right
    $pdf->Cell(60);
    //Title
    $pdf->Cell(80,10,'Sunny Computers | Yaval',0,0,'C');
    //Line break
    $pdf->Ln(20);
$pdf->SetFont('Times','',12);
$pdf->SetY(35);
$pdf->SetX(150);
$pdf->Cell(0,5,$date,0,1);
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
$pdf->SetY(185);
$pdf->Cell(0,5,$details8,0,1);
$pdf->SetY(195);
$pdf->SetX(50);
$pdf->Cell(0,5,$details9,0,1);
$pdf->SetX(50);
$pdf->Cell(0,5,$details10,0,1);
$pdf->SetY(220);
$pdf->Cell(0,5,$ending1,0,1);
$pdf->Cell(0,5,$ending2,0,1);
$pdf->SetY(260);
$pdf->SetX(140);
$pdf->Cell(0,5,$signature,0,1);

//ICARD
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