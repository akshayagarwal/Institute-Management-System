<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<title>Add New Enquiry Source | Lead India Technologies</title>
</head>

<body>

<?php
include "dbinst.php";
$name=$_POST['source_name'];
$remarks=$_POST['remarks'];
$query="SELECT COUNT(*) FROM eqsource";
$results=mysql_query($query);
list($id)=mysql_fetch_row($results);
$id=$id+1;
$atime=time();
$status="ACTIVE";
$query="INSERT INTO eqsource SET ID='$id',NAME='$name',REMARKS='$remarks',ATIME='$atime',STATUS='$status'";
$results=mysql_query($query);
if($results)
{
	echo "<b>New Enquiry Source Added Successfully";
	echo "<br/>";
	echo "<b>Source ID : ".$id;
	echo "<br/>";
	echo "<b>Source Name : ".$name;
	echo "<br/>";
	echo "<b>Remarks : ".$remarks;
}
else
{
	echo "<b>Error in Adding New Enquiry Source, Kindly Refresh or try Again";
}
?>

</body>
</html>
