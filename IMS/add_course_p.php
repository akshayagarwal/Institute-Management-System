<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<title>Add Course Result</title>
</head>

<body>

<?php
include "dbinst.php";
$name=$_POST['course_name'];
$id=$_POST['course_code'];
$duration=$_POST['course_duration'];
$fees=$_POST['course_fees'];
$query="INSERT INTO courses SET NAME='$name',ID='$id',DURATION='$duration',FEES='$fees'";
$results=mysql_query($query);

if($results)
{
	echo "New Course Successfully Added";
}
else
 echo "Error In Adding New Course, Please Try Again";
mysql_close();
?>

</body>
</html>
