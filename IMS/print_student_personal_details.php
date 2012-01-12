<?php
require('fpdf.php');

include "dbinst.php";
$id=$_POST['id'];

$query="SELECT PID,ADDRESS1,ADDRESS2,ADDRESS3,PINCODE,FNAME,MNAME,LNAME,COURSE,BATCH,MOBILE,DOA,DOB,GENDER,MARS,QUALIFICATION,LANDLINE,MEDIUM,DISCOUNT,SBI FROM students WHERE ID='$id'";
$results=mysql_query($query);
list($pid,$address1,$address2,$address3,$pincode,$fname,$mname,$lname,$course,$batch,$mobile,$doa,$dob,$gender,$mars,$qualification,$landline,$medium,$discount,$sbi)=mysql_fetch_row($results);


$query="SELECT FEES FROM courses WHERE NAME='$course'";
$results=mysql_query($query);
list($fees)=mysql_fetch_row($results);

$query="SELECT NAME FROM students WHERE ID='$pid'";
$results=mysql_query($query);
list($pname)=mysql_fetch_row($results);
$dfee=$fees-$discount;


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
    $pdf->Cell(80,10,'Sunny Computers',0,0,'C');
    
    $pdf->SetY(11);
    $pdf->SetX(75);
    $pdf->SetFont('Times','',12);
    $pdf->Cell(70,20,'Yawal Taluka Shetkari Sangh , Vyapari Sankul , Shop No. A-1 , Yawal',0,0,'C');
    
    $pdf->SetY(16);
    $pdf->SetX(75);
    $pdf->Cell(70,20,'Dist. Jalgaon (M.H.) Pin: 425301 Contact :(02585) 261113',0,0,'C');
    
    //Line Separator
    $pdf->SetY(30);
    $pdf->SetX(30);
    $pdf->Cell(150,0,'',1);
    
    $pdf->SetFont('Times','B',12);
    $pdf->SetY(32);
    $pdf->SetX(66);
    $pdf->Cell(80,10,'Admission Form',0,0,'C');
    
    $pdf->SetFont('Times','IB',11);
    $pdf->SetY(42);
    $pdf->SetX(30);
    $pdf->Cell(30,10,"Student ID :  ",0,0);
    $pdf->SetFont('Times','',11);
    $pdf->SetX(50);
    $pdf->Cell(30,10,$id,0,0);
    $pdf->SetX(150);
    $pdf->SetFont('Times','IB',11);
    $pdf->Cell(30,10,"Date : ",0,0);
    $pdf->SetFont('Times','',11);
    $pdf->SetX(160);
    $pdf->Cell(30,10,$doa,0,0);
    
    $pdf->SetY(50);
    $pdf->SetX(30);
    $pdf->SetFont('Times','IB',11);
    $pdf->Cell(30,10,"Student Name :  ",0,0);
    $pdf->SetFont('Times','',11);
    $pdf->SetX(70);
    $pdf->Cell(30,10,$fname."              ".$mname."              ".$lname,0,0);
    $pdf->SetY(54);
    $pdf->SetX(70);
    $pdf->SetFont('Times','',8);
    $pdf->Cell(30,10,"First Name"."            "."Middle Name"."            "."Last Name",0,0);
    
    $pdf->SetY(62);
    $pdf->SetX(30);
    $pdf->SetFont('Times','IB',11);
    $pdf->Cell(30,10,"Date Of Birth :  ",0,0);
    $pdf->SetFont('Times','',11);
    $pdf->SetX(70);
    $pdf->Cell(30,10,$dob,0,0);
    
    $pdf->SetY(70);
    $pdf->SetX(30);
    $pdf->SetFont('Times','IB',11);
    $pdf->Cell(30,10,"Age :  ",0,0);
    $pdf->SetFont('Times','',11);
    $pdf->SetX(70);
    $pdf->Cell(30,10,$dob,0,0);
    
    $pdf->SetY(78);
    $pdf->SetX(30);
    $pdf->SetFont('Times','IB',11);
    $pdf->Cell(30,10,"Gender :  ",0,0);
    $pdf->SetFont('Times','',11);
    $pdf->SetX(70);
    $pdf->Cell(30,10,$gender,0,0);
    
    $pdf->SetY(86);
    $pdf->SetX(30);
    $pdf->SetFont('Times','IB',11);
    $pdf->Cell(30,10,"Maritial Status :  ",0,0);
    $pdf->SetFont('Times','',11);
    $pdf->SetX(70);
    $pdf->Cell(30,10,$mars,0,0);
    
    $pdf->SetY(94);
    $pdf->SetX(30);
    $pdf->SetFont('Times','IB',11);
    $pdf->Cell(30,10,"Qualification :  ",0,0);
    $pdf->SetFont('Times','',11);
    $pdf->SetX(70);
    $pdf->Cell(30,10,$qualification,0,0);
    
    $pdf->SetY(102);
    $pdf->SetX(30);
    $pdf->SetFont('Times','IB',11);
    $pdf->Cell(30,10,"Permanent address :  ",0,0);
    $pdf->SetFont('Times','',11);
    $pdf->SetX(70);
    $pdf->Cell(30,10,$address1,0,0);
    $pdf->SetY(107);
    $pdf->SetX(70);
    $pdf->Cell(30,10,$address2,0,0);
    $pdf->SetY(111);
    $pdf->SetX(70);
    $pdf->Cell(30,10,$address3,0,0);
    $pdf->SetY(117);
    $pdf->SetX(70);
    $pdf->Cell(30,10,"Pincode : ".$pincode,0,0);
    
    $pdf->SetY(125);
    $pdf->SetX(30);
    $pdf->SetFont('Times','IB',11);
    $pdf->Cell(30,10,"Landline :  ",0,0);
    $pdf->SetFont('Times','',11);
    $pdf->SetX(70);
    $pdf->Cell(30,10,$landline,0,0);
    
    $pdf->SetY(133);
    $pdf->SetX(30);
    $pdf->SetFont('Times','IB',11);
    $pdf->Cell(30,10,"Mobile :  ",0,0);
    $pdf->SetFont('Times','',11);
    $pdf->SetX(70);
    $pdf->Cell(30,10,$mobile,0,0);
    
    $pdf->SetY(141);
    $pdf->SetX(30);
    $pdf->SetFont('Times','IB',11);
    $pdf->Cell(30,10,"Course :  ",0,0);
    $pdf->SetFont('Times','',11);
    $pdf->SetX(70);
    $pdf->Cell(30,10,$course,0,0);
    
    $pdf->SetY(149);
    $pdf->SetX(30);
    $pdf->SetFont('Times','IB',11);
    $pdf->Cell(30,10,"Medium :  ",0,0);
    $pdf->SetFont('Times','',11);
    $pdf->SetX(70);
    $pdf->Cell(30,10,$medium,0,0);
    
    $pdf->SetY(157);
    $pdf->SetX(30);
    $pdf->SetFont('Times','IB',11);
    $pdf->Cell(30,10,"Batch :  ",0,0);
    $pdf->SetFont('Times','',11);
    $pdf->SetX(70);
    $pdf->Cell(30,10,$batch,0,0);
    
    $pdf->SetY(165);
    $pdf->SetX(30);
    $pdf->SetFont('Times','IB',11);
    $pdf->Cell(30,10,"Total Fee :  ",0,0);
    $pdf->SetFont('Times','',11);
    $pdf->SetX(70);
    $pdf->Cell(30,10,$dfee,0,0);
    
    $pdf->SetY(173);
    $pdf->SetX(30);
    $pdf->SetFont('Times','IB',11);
    $pdf->Cell(30,10,"SBI Account No :  ",0,0);
    $pdf->SetFont('Times','',11);
    $pdf->SetX(70);
    $pdf->Cell(30,10,$sbi,0,0);
    
    $pdf->SetY(181);
    $pdf->SetX(30);
    $pdf->SetFont('Times','IB',11);
    $pdf->Cell(30,10,"Referred By :  ",0,0);
    $pdf->SetFont('Times','',11);
    $pdf->SetX(70);
    $pdf->Cell(30,10,$pid."   ( ".$pname." ) ",0,0);
    
    $pdf->SetY(69);
    $pdf->SetX(145);
    $pdf->Cell(22,30,'',1);
    $pdf->SetY(77);
    $pdf->SetX(146);
    $pdf->Cell(30,10,"Photograph",0,0);
    
    $pdf->SetY(220);
    $pdf->SetX(140);
    $pdf->Cell(0,5,"Student Signature",0,1);
    $pdf->SetY(260);
    $pdf->SetX(30);
    $pdf->Cell(0,5,"Authorised Stamp & Signature",0,0,'C');
    

    
    
$pdf->SetFont('Times','',12);
$pdf->SetY(35);
$pdf->SetX(150);
//$pdf->Cell(0,5,$date,0,1);

$pdf->Output();
?>