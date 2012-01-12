<?php
require('fpdf.php');

include "dbinst.php";

$id=$_POST['id'];

$query="SELECT COURSE,DISCOUNT,FNAME,MNAME,LNAME FROM students WHERE ID='$id'";
$results=mysql_query($query);
list($course,$discount,$fname,$mname,$lname)=mysql_fetch_row($results);

$query="SELECT FEES FROM courses WHERE NAME='$course'";
$results=mysql_query($query);
list($fees)=mysql_fetch_row($results);


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
    $pdf->Cell(80,10,'Fees Payment Details',0,0,'C');
    
    $pdf->SetFont('Times','IB',12);
    $pdf->SetY(45);
    $pdf->SetX(30);
    $pdf->Cell(80,10,'Student ID : ',0,0);
    $pdf->SetFont('Times','',11);
    $pdf->SetX(70);
    $pdf->Cell(30,10,$id,0,0);
    
    $pdf->SetY(53);
    $pdf->SetX(30);
    $pdf->SetFont('Times','IB',11);
    $pdf->Cell(30,10,"Student Name :  ",0,0);
    $pdf->SetFont('Times','',11);
    $pdf->SetX(70);
    $pdf->Cell(30,10,$fname."              ".$mname."              ".$lname,0,0);
    
    $pdf->SetY(70);
    $pdf->SetX(60);
    $pdf->Cell(28,7,'',1);
    $pdf->SetY(69);
    $pdf->SetX(61);
    $pdf->Cell(20,10,"Receipt No.",0,0);
    
    $pdf->SetY(70);
    $pdf->SetX(88);
    $pdf->Cell(28,7,'',1);
    $pdf->SetY(69);
    $pdf->SetX(92);
    $pdf->Cell(20,10,"Date",0,0);
    
    $pdf->SetY(70);
    $pdf->SetX(116);
    $pdf->Cell(28,7,'',1);
    $pdf->SetY(69);
    $pdf->SetX(119);
    $pdf->Cell(20,10,"Amount",0,0);
    
    $query="SELECT RNO,DOP,AMOUNT FROM fees WHERE STUDID='$id'";
    $results=mysql_query($query);
    $yposition=77;
    $total=0;
    while(list($rno,$dop,$amount)=mysql_fetch_row($results))
    {
        $pdf->SetY($yposition);
        $pdf->SetX(60);
        $pdf->Cell(28,7,'',1);
        $pdf->SetY(($yposition-1));
        $pdf->SetX(61);
        $pdf->Cell(20,10,$rno,0,0);
        
        $pdf->SetY($yposition);
        $pdf->SetX(88);
        $pdf->Cell(28,7,'',1);
        $pdf->SetY(($yposition-1));
        $pdf->SetX(92);
        $pdf->Cell(20,10,$dop,0,0);
        
        $pdf->SetY($yposition);
        $pdf->SetX(116);
        $pdf->Cell(28,7,'',1);
        $pdf->SetY(($yposition-1));
        $pdf->SetX(119);
        $pdf->Cell(20,10,$amount,0,0);
        
        $yposition+=7;
        $total+=$amount;
    }
        $pdf->SetY($yposition);
        $pdf->SetX(60);
        $pdf->Cell(56,7,'',1);
        $pdf->SetY(($yposition-1));
        $pdf->SetX(92);
        $pdf->SetFont('Times','B',11);
        $pdf->Cell(20,10,"Total",0,0);
        
        /*$pdf->SetY($yposition);
        $pdf->SetX(88);
        $pdf->Cell(28,7,'',1);
        $pdf->SetY($yposition);
        $pdf->SetX(92);
        $pdf->Cell(20,10,"Total",0,0);*/
        
        $pdf->SetY($yposition);
        $pdf->SetX(116);
        $pdf->Cell(28,7,'',1);
        $pdf->SetY(($yposition-1));
        $pdf->SetX(119);
        $pdf->SetFont('Times','B',11);
        $pdf->Cell(20,10,$total,0,0);
    
    
    $pdf->Output();
    
?>