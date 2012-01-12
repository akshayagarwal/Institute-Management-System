<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<title>Pay Fees | Lead India Technologies</title>
</head>

<body>

<?php

include "dbinst.php";
$rno=$_POST['rno'];
$dopdd=$_POST['dopdd'];
$dopmm=$_POST['dopmm'];
$dopyyyy=$_POST['dopyyyy'];
$studid=$_POST['studid'];
$amount=$_POST['amount'];
$remarks=$_POST['remarks'];

$dop=$dopdd."-".$dopmm."-".$dopyyyy;

$flag=0;

$query="SELECT FNAME,MNAME,LNAME,COURSE,FEESPAID,MOBILE FROM students WHERE ID='$studid'";
$results=mysql_query($query);
if(mysql_num_rows($results)>0)
{
	list($fname,$mname,$lname,$course,$feespaid,$mobile)=mysql_fetch_row($results);
	$flag=1;
}	
else
{
	echo "<b>Invalid Student ID, Kindly Try Again!";
	echo "<form action='pay_fees_p.php' method='post'>";
	echo "<input type='hidden' name='rno' value='$rno'/>";
	echo "<input type='hidden' name='dopdd' value='$dopdd'/>";
	echo "<input type='hidden' name='dopmm' value='$dopmm'/>";
	echo "<input type='hidden' name='dopyyyy' value='$dopyyyy'/>";
	echo "<input type='hidden' name='amount' value='$amount'/>";
	echo "<input type='hidden' name='remarks' value='$remarks'/>";
	echo "<label for='studid'>Student ID</label>";
	echo "<input type='text' name='studid' id='studid'/>";
	echo "<input type='submit' name='submit' value='Submit'/>";
	echo "</form>";
}
if($flag)
{
	//echo "Its $studid,$rno,$amount,$remarks,$feespaid,$course,$fname,$mname,$lname";
	
	$feespaid=$feespaid+$amount;
	$ptime=time();
	$feesflag=0;
	$payelig=1;
	/*******COUNT NO OF ROWS IN FEES TO GENERATE ITRANSID***********/
	$query="SELECT COUNT(*) FROM fees";
		$results=mysql_query($query);
		list($itransid)=mysql_fetch_row($results);
		$itransid=$itransid+1;
	$query="INSERT INTO fees SET ITRANSID='$itransid',RNO='$rno',STUDID='$studid',AMOUNT='$amount',REMARKS='$remarks',TIME='$ptime',DOP='$dop'";
	$results=mysql_query($query);
	
	$query="SELECT FEES FROM courses WHERE NAME='$course'";
	$results=mysql_query($query);
	list($fees)=mysql_fetch_row($results);
	$remaining=$fees-$feespaid;
	if($remaining<=0)
	{
		$feesflag=1;
	}
	if($feesflag)
	{
		$query="SELECT CHILD1,CHILD2 FROM students WHERE ID='$studid'";
		$results=mysql_query($query);
		list($child1,$child2)=mysql_fetch_row($results);
		if($child1!=NULL AND $child2!=NULL)
		{
			$payelig=1;
		}
		
	}
	/***UPDATE STUDENT DETAILS************/
	$query="UPDATE students SET FEESPAID='$feespaid',FEESFLAG='$feesflag',PAYELIG='$payelig',LFTIME='$ptime' WHERE ID='$studid'";
	$results=mysql_query($query);
	if($results)
	{
		echo "<b>Fees Paid Successfully";
		echo "<br/>";
		echo "<b>Following are the updated details";
		echo "<br/>";
		echo "<b>Student Name : ".$fname." ".$mname." ".$lname;
		echo "<br/>";
		echo "<b>Course : ".$course;
		echo "<br/>";
		echo "<b>Fees Paid : ".$feespaid;
		echo "<br/>";
		echo "<b>Fees Remaining : ".$remaining;
		echo "<br/>";
		$url = "http://smscgateway.com/messageapi.asp?username=sunnycomputers&password=tamanna&sender=SUNNYCOM&mobile=".$mobile."&message=Dear%20".$fname.",%20Your%20payment%20of%20Rs%20".$amount."%20towards%20".$course."%20course%20is%20confirmed.%20Fees%20remaining%20is%20Rs%20".$remaining."%20Thanks!";
		$curl = curl_init();
				
		// set URL and other appropriate options
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, false);
		curl_setopt($curl, CURLOPT_HEADER, false);
	
		
		// grab URL and pass it to the browser
	
		curl_exec($curl);
	
		if (curl_errno($curl)) {
		print curl_error($curl);
		} else {
		curl_close($curl);
		}
	}
}
?>

</body>
</html>
