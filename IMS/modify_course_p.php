<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<title>Modify Course</title>
</head>

<body>

<?php
include "dbinst.php";
$name=$_POST['course_name'];
$id=$_POST['course_code'];
$duration=$_POST['course_duration'];
$fees=$_POST['course_fees'];
$contents=$_POST['course_contents'];
$query="UPDATE courses SET NAME='$name',ID='$id',DURATION='$duration',FEES='$fees',CONTENTS='$contents' WHERE ID='$id'";
$results=mysql_query($query);

if($results)
{
	echo "Course Updated Successfully";
}
else
 echo "Error In Updating Course, Please Try Again";
mysql_close();
?>

</body>
</html>
