<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<title>Modify Batch | Lead India Technologies</title>
</head>

<body>

<?php
include "dbinst.php";
$id=$_POST['batch_code'];
$course=$_POST['course'];
$start=$_POST['start_time'];
$time1=$_POST['time1'];
$end=$_POST['end_time'];
$time2=$_POST['time2'];
$strength=$_POST['batch_strength'];
$start="$start"."$time1";
$end="$end"."$time2";
$query="UPDATE batches SET ID='$id',COURSE='$course',START='$start',END='$end',STRENGTH='$strength' WHERE ID='$id'";
$results=mysql_query($query);

if($results)
{
	echo "Batch Updated Successfully";
}
else
 echo "Error In Updating Batch, Please Try Again";
mysql_close();
?>

</body>
</html>
