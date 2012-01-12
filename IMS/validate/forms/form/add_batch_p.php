<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<title>Add Batch</title>
</head>

<body>

<?php
include "dbinst.php";
$name=$_POST['course_name'];
$id=$_POST['batch_code'];
$start=$_POST['start_time'];
$time1=$_POST['time1'];
$end=$_POST['end_time'];
$time2=$_POST['time2'];
$strength=$_POST['batch_strength'];
$start="$start"."$time1";
$end="$end"."$time2";
$query="INSERT INTO batches SET COURSE='$name',ID='$id',START='$start',END='$end',STRENGTH='$strength',ID2='$id'";
$results=mysql_query($query);

if($results)
{
	$query2="SELECT batches from courses WHERE NAME='$name'";
	$results2=mysql_query($query2);
	list($batches)=mysql_fetch_row($results2);
	$batches=$batches+1;
	$query3="UPDATE courses SET BATCHES='$batches' WHERE NAME='$name'";
	$results3=mysql_query($query3);
	echo "New Batch Successfully Added";
}
else
 echo "Error In Adding New Batch, Please Try Again";
mysql_close();
?>


</body>
</html>
