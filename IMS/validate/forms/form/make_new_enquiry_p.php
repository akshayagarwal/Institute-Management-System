<html>
	<head>
		<title>Make New Enquiry | Lead India Technologies</title>
	</head>
	<body>
<?php

/*************Retrieve Information from Registration Form**********************/
include "dbinst.php";

$course=$_POST['course_name'];
$fname=$_POST['fname'];
$mname=$_POST['mname'];
$sname=$_POST['sname'];
$dd=$_POST['dd'];
$mm=$_POST['mm'];
$yyyy=$_POST['yyyy'];
$gender=$_POST['gender'];
$address1=$_POST['address1'];
$address2=$_POST['address2'];
$address3=$_POST['address3'];
$pincode=$_POST['pincode'];
$mobile=$_POST['mobile'];
$landline=$_POST['landline'];
$email=$_POST['email'];
$remarks=$_POST['remarks'];
$source_name=$_POST['source_name'];
//echo "Mobile is $mobile";
$y1=date('Y');
$dob=$dd."-".$mm."-".$yyyy;


echo "<form action='make_new_enquiry_pop.php' method='post'>";
echo "<input type='hidden' name='course_name' value='$course'/>";
echo "<input type='hidden' name='fname' value='$fname'/>";
echo "<input type='hidden' name='mname' value='$mname'/>";
echo "<input type='hidden' name='sname' value='$sname'/>";
echo "<input type='hidden' name='dob' value='$dob'/>";
echo "<input type='hidden' name='gender' value='$gender'/>";
echo "<input type='hidden' name='address1' value='$address1'/>";
echo "<input type='hidden' name='address2' value='$address2'/>";
echo "<input type='hidden' name='address3' value='$address3'/>";
echo "<input type='hidden' name='pincode' value='$pincode'/>";
echo "<input type='hidden' name='mobile' value='$mobile'/>";
echo "<input type='hidden' name='landline' value='$landline'/>";
echo "<input type='hidden' name='email' value='$email'/>";
echo "<input type='hidden' name='remarks' value='$remarks'/>";
echo "<input type='hidden' name='source_name' value='$source_name'/>";
echo "<br/>";
echo "Select the preferred batch";


function create_dropdown($identifier,$pairs,$first)
{
   $dropdown="<select name=\"$identifier\"> ";
    $dropdown.="<option>$first</option>";
     
     foreach($pairs AS $value => $name)
     {
        $dropdown.="<option>$name</option>";
     }
     
     //echo "</select>";
   return $dropdown;
}
include "dbinst.php";
$query="SELECT ID2,ID FROM batches WHERE COURSE='$course' AND ADMISSIONS<STRENGTH";
$results=mysql_query($query);
while($row = mysql_fetch_array($results))
{
$value = $row["ID2"];
$name = $row["ID"];
$pairs["$value"] = $name;
}
echo create_dropdown("batch_code",$pairs,"Select Batch");
echo "<input type='submit' name='submit' value='Submit'>";

echo "</form>";
?>

</body>
	</html>
