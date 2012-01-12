<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<title>View/Modify Student | Lead India Technologies</title>
</head>

<body>

<?php
include "dbinst.php";
$id=$_POST['id'];
$fname=$_POST['fname'];
$mname=$_POST['mname'];
$lname=$_POST['sname'];
$address1=$_POST['address1'];
$address2=$_POST['address2'];
$address3=$_POST['address3'];
$mobile=$_POST['mobile'];
$landline=$_POST['landline'];
$pincode=$_POST['pincode'];
$email=$_POST['email'];
$status=$_POST['status'];
$remarks=$_POST['remarks'];
if($status=="Yes")
 $status="ADMITTED";
else
 $status="ENQUIRED";

$query="UPDATE enquiries SET FNAME='$fname',MNAME='$mname',LNAME='$lname',ADDRESS1='$address1',ADDRESS2='$address2',ADDRESS3='$address3',PINCODE='$pincode',MOBILE='$mobile',LANDLINE='$landline',REMARKS='$remarks',EMAIL='$email',STATUS='$status' WHERE ID='$id'";
$results=mysql_query($query);
if($results)
{
	echo "Updated Successfully";
}
else
{
	echo "Error in updating,kindly try again";
}

?>

</body>
</html>
