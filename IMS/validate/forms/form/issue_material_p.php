<?php
include "dbinst.php";
$matname=$_POST['mcode'];
$studid=$_POST['studid'];
$quantity=$_POST['quantity'];
$remarks=$_POST['remarks'];

$query="SELECT FNAME,MNAME,LNAME,FEESPAID FROM students WHERE ID='$studid'";
$results=mysql_query($query);
if(mysql_num_rows($results)>0)
{
 list($fname,$mname,$lname,$feespaid)=mysql_fetch_row($results);
 $query = "SELECT MCODE,REMAIN FROM materials WHERE MATNAME='$matname'";
 $results=mysql_query($query);
 list($mcode,$remain)=mysql_fetch_row($results);
 $query="SELECT COUNT(*) FROM missue";
 $results=mysql_query($query);
 list($mtransid)=mysql_fetch_row($results);
 $mtransid=$mtransid+1;
 $itime=time();
 //echo "ITs $studid,$mtransid,$mcode,$matname,$quantity,$itime,$remarks,$remaining";
 if($remain>0)
 {
    if($feespaid>0)
    {
		$query="INSERT INTO `missue` (`MTRANSID`, `STUDID`, `MCODE`, `MATNAME`, `QUANTITY`, `ITIME`, `REMARKS`) VALUES ('$mtransid', '$studid', '$mcode', '$matname', '$quantity', '$itime', '$remarks')";
		$results=mysql_query($query);
		if($results)
		{
			$remain=$remain-$quantity;
			$query = "UPDATE materials SET REMAIN='$remain' WHERE MCODE='$mcode'";
			$results=mysql_query($query);
			if($results)
			{
			echo "<b>Material Issued Successfully";
			echo "<br/>";
			echo "<b>MTrans. ID : ".$mtransid;
			echo "<br/>";
			echo "<b>Student ID :".$studid;
			echo "<br/>";
			echo "<b>Student Name : ".$fname." ".$mname." ".$lname;
			echo "<br/>";
			echo "<b>Material Name: ".$matname;
			echo "<br/>";
			echo "<b>Quantity: ".$quantity;
			echo "<br/>";
			echo "<b>Remarks : ".$remarks;
			echo "<br/>";
			echo "<b>Material Remaining : $remain";
			}
			else
			{
			 echo "<b> Coldn't Reset Materials";
			}
		    
		}
		else
		{
			echo "<b>Error,Kindly Refresh or Try Again";
		}
	
     }
     
  else
   {
	echo "Selected Student has not yet paid any installments,so material cannot be issued!";
   }
 }
 
 else
 {
	echo "Selected Material is Out of Stock, so material cannot be issued";
 }
}
else
{
	echo "Invalid Student ID, Kindly Enter Again";
	echo "<form action='issue_material_p.php' method='post'>";
	echo "<input type='hidden' name='material_name' value='$matname'/>";
	echo "<input type='hidden' name='quantity' value='$quantity'/>";
	echo "<input type='hidden' name='remarks' value='$remarks'/>";
	echo "<label for='studid'>Student ID</label>";
	echo "<input type='text' name='studid' id='studid' maxlength='9'/>";
	echo "<input type='submit' name='submit' value='Submit'/>";
	echo "</form>";
}
?>

