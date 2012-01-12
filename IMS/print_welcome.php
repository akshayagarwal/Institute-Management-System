<?php
require('fpdf.php');

include "dbinst.php";
$id=$_GET['id'];

$query="SELECT PID,ADDRESS,FNAME,MNAME,LNAME,COURSE,BATCH,PASSWORD FROM students WHERE ID='$id'";
$results=mysql_query($query);
list($pid,$address,$fname,$mname,$lname,$course,$batch,$password)=mysql_fetch_row($results);

$query="SELECT START,END FROM batches WHERE ID='$batch'";
$results=mysql_query($query);
list($start,$end)=mysql_fetch_row($results);

$query="SELECT DURATION,FEES,CONTENTS FROM courses WHERE NAME='$course'";
$results=mysql_query($query);
list($duration,$fees,$course_contents)=mysql_fetch_row($results);

$name=$fname." ".$mname." ".$lname;
$salutation="Dear ".$fname." ,";
$contents="Welcome to Sunny Computers. We are commited to providing world class computer education & create leaders in this field. We are glad to confirm your registration with us. Your registration details are as follows :-";
$details="Registration ID: $id \nCourse: $course \nCourse Contents: $course_contents\nCourse Duration: $duration\nCourse Fees: $fees\nBatch: $batch\nBatch Timings: $start to $end\nThe following are details for accessing online resources :-\nUsername: $id\nPassword: $password\n\nWe look forward to an exciting & fulfilling academic relationship with you.";
$signature="For Sunny Computers,\nYaval";
$date="Date: ".date("D, d F Y");

/*class PDF extends FPDF
{
function Header()
{
    global $title;

    //Arial bold 15
    $this->SetFont('Arial','B',15);
    //Calculate width of title and position
    $w=$this->GetStringWidth($title)+6;
    $this->SetX((210-$w)/2);
    //Colors of frame, background and text
    $this->SetDrawColor(0,0,0);
    $this->SetFillColor(193,195,197);
    $this->SetTextColor(0,0,0);
    //Thickness of frame (1 mm)
    $this->SetLineWidth(1);
    //Title
    $this->Cell($w,9,$title,1,1,'C',true);
    //Line break
    $this->Ln(10);

}

function Footer()
{
    //Position at 1.5 cm from bottom
    $this->SetY(-15);
    //Arial italic 8
    $this->SetFont('Arial','I',8);
    //Text color in gray
    $this->SetTextColor(128);
    //Page number
    $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
}

function ChapterTitle($num,$label)
{
    //Arial 12
    $this->SetFont('Arial','',12);
    //Background color
    $this->SetFillColor(200,220,255);
    //Title
    $this->Cell(0,6,"Chapter $num : $label",0,1,'L',true);
    //Line break
    $this->Ln(4);
}

function ChapterBody($file)
{
    //Read text file
    $f=fopen($file,'r');
    $txt=fread($f,filesize($file));
    fclose($f);
    //Times 12
    $this->SetFont('Times','',12);
    //Output justified text
    $this->MultiCell(0,5,$txt);
    //Line break
    $this->Ln();
    //Mention in italics
    $this->SetFont('','I');
    $this->Cell(0,5,'(end of excerpt)');
}

function PrintChapter($num,$title,$file)
{
    $this->AddPage();
    $this->ChapterTitle($num,$title);
    $this->ChapterBody($file);
}
}
*/

$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->Cell(20,60,$date);
$pdf->Cell(30,5,$name);
$pdf->Cell(50,5,$address);
$pdf->Cell(100,10,$salutation);
$pdf->Cell(110,15,$content);
$pdf->Cell(130,30,$details);
$pdf->Cell(200,30,$signature);
$pdf->Output();
?>