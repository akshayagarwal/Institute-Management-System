<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<title>Pay Fees | Lead India Technologies</title>
</head>

<body>

<?php

include "dbinst.php";
$rno=$_POST['rno'];
$studid=$_POST['studid'];
$amount=$_POST['amount'];
$remarks=$_POST['remarks'];
$feespaid=$_POST['feespaid'];
$course=$_POST['course'];
$mobile=$_POST['mobile'];
$fname=$_POST['fname'];
$fname=$_POST['mname'];
$fname=$_POST['lname'];

$feespaid=$feespaid+$amount;
$ptime=time();
$feesflag=0;
$payelig=1;
/*******COUNT NO OF ROWS IN FEES TO GENERATE ITRANSID***********/
$query="SELECT COUNT(*) FROM fees";
	$results=mysql_query($query);
	list($itransid)=mysql_fetch_row($results);
	$itransid=$itransid+1;
$query="INSERT INTO fees SET ITRANSID='$itransid',RNO='$rno',STUDID='$studid',AMOUNT='$amount',REMARKS='$remarks',TIME='$ptime'";
$results=mysql_query($query);

$query="SELECT FEES FROM courses WHERE NAME='$course'";
$results=mysql_query($results);
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
$query="UPDATE students SET FEESPAID='$feespaid',FEESFLAG='$feesflag',PAYELIG='$payelig' WHERE ID='$studid'";
$results=mysql_query($query);
if($results)
{
	echo "<b>Fees Paid Successfully";
	echo "<br/>";
	echo "<b>Following are the updated details";
	echo "<br/>";
	echo "<b>Student Name : ".$fname." ".$sname." ".$lname;
	echo "<br/>";
	echo "<b>Course : ".$course;
	echo "<br/>";
	echo "<b>Fees Paid : ".$feespaid;
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
?>

</body>
</html>
