<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<title>Course Completion | Lead India Technologies</title>
</head>

<body>

<?php
include "dbinst.php";
$studid=$_POST['studid'];
$query="UPDATE students SET COURSE_STATUS='COMPLETED' WHERE ID='$studid'";
$results=mysql_query($query);
if($results)
{
   
	echo "Updated Successfully!";
}
else
   {
	echo "Error in Updating,Kindly Refresh or try again.";
   }
?>

</body>
</html>
