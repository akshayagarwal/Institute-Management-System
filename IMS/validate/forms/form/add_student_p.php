<html>
	<head>
		<title>Add New Student | Lead India Technologies</title>
	</head>
	<body>
<?php

/*************Retrieve Information from Registration Form**********************/
include "dbinst.php";
$pid=$_POST['pid'];
$course=$_POST['course_name'];
$medium=$_POST['medium'];
$fname=$_POST['fname'];
$mname=$_POST['mname'];
$sname=$_POST['sname'];
$dd=$_POST['dd'];
$mm=$_POST['mm'];
$yyyy=$_POST['yyyy'];
$gender=$_POST['gender'];
$mars=$_POST['mars'];
$qualification=$_POST['qualification'];
$discount=$_POST['discount'];
$doadd=$_POST['doadd'];
$doamm=$_POST['doamm'];
$doayyyy=$_POST['doayyyy'];
$sbi=$_POST['sbi'];
$branch=$_POST['branch'];
$address1=$_POST['address1'];
$address2=$_POST['address2'];
$address3=$_POST['address3'];
$pincode=$_POST['pincode'];
$mobile=$_POST['mobile'];
$landline=$_POST['landline'];
$email=$_POST['email'];
$remarks=$_POST['remarks'];
$flag=0;
$query="SELECT ABSLEVEL,CHILD1,CHILD2 FROM students WHERE ID='$pid'";
$results=mysql_query($query);
$n=mysql_num_rows($results);
/********************CHECK FOR INVALID PID****************************/
if($n<=0)
{
	echo "<form action='add_student_p.php' method='POST'>";
	echo "<p>Invalid Referral ID, Kindly enter again & Click on Check";
	echo "<br/>";
	echo "<p>Referred By <input type='text' name='pid' value='' maxlength='9'/>";
	echo "<input type='button' name='search_pid' value='Search' onClick='window.open('../../../view_students.php','search_student')'/>";
	echo "<input type='hidden' name='course_name' value='$course'/>";
	echo "<input type='hidden' name='medium' value='$medium'/>";
	echo "<input type='hidden' name='fname' value='$fname'/>";
	echo "<input type='hidden' name='mname' value='$mname'/>";
	echo "<input type='hidden' name='sname' value='$sname'/>";
	echo "<input type='hidden' name='dd' value='$dd'/>";
	echo "<input type='hidden' name='mm' value='$mm'/>";
	echo "<input type='hidden' name='yyyy' value='$yyyy'/>";
	echo "<input type='hidden' name='gender' value='$gender'/>";
	echo "<input type='hidden' name='mars' value='$mars'/>";
	echo "<input type='hidden' name='qualification' value='$qualification'/>";
	echo "<input type='hidden' name='sbi' value='$sbi'/>";
	echo "<input type='hidden' name='branch' value='$branch'/>";
	echo "<input type='hidden' name='address1' value='$address1'/>";
	echo "<input type='hidden' name='address2' value='$address2'/>";
	echo "<input type='hidden' name='address3' value='$address3'/>";
	echo "<input type='hidden' name='pincode' value='$pincode'/>";
	echo "<input type='hidden' name='mobile' value='$mobile'/>";
	echo "<input type='hidden' name='landline' value='$landline'/>";
	echo "<input type='hidden' name='email' value='$email'/>";
	echo "<input type='hidden' name='doadd' value='$doadd'/>";
	echo "<input type='hidden' name='doamm' value='$doamm'/>";
	echo "<input type='hidden' name='doayyyy' value='$doayyyy'/>";
	echo "<input type='hidden' name='discount' value='$discount'/>";
	echo "<input type='hidden' name='remarks' value='$remarks'/>";
	echo "<input type='submit' name='submit' value='Check'>";
	echo "</form>";
}
else
{
	list($abslevel,$child1,$child2)=mysql_fetch_row($results);
	/***********************CHECK IF ALREADY 2 CHILD OF PARENT*********************/
	if($child1!=NULL AND $child2!=NULL)
	{
	echo "<p>Selected Referral ID has already made 2 members, Kindly Choose another Referral ID & Click on Check";
		echo "<br/>";
		echo "<form action='add_student_p.php' method='POST'>";
		echo "<p>Referred By <input type='text' name='pid' value='' maxlength='9'/>";
		echo "<input type='button' name='search_pid' value='Search' onClick='window.open('../../../view_students.php','search_student')'/>";
		echo "<input type='hidden' name='course_name' value='$course'/>";
		echo "<input type='hidden' name='medium' value='$medium'/>";
		echo "<input type='hidden' name='fname' value='$fname'/>";
		echo "<input type='hidden' name='mname' value='$mname'/>";
		echo "<input type='hidden' name='sname' value='$sname'/>";
		echo "<input type='hidden' name='dd' value='$dd'/>";
		echo "<input type='hidden' name='mm' value='$mm'/>";
		echo "<input type='hidden' name='yyyy' value='$yyyy'/>";
		echo "<input type='hidden' name='gender' value='$gender'/>";
		echo "<input type='hidden' name='mars' value='$mars'/>";
	        echo "<input type='hidden' name='qualification' value='$qualification'/>";
		echo "<input type='hidden' name='sbi' value='$sbi'/>";
		echo "<input type='hidden' name='branch' value='$branch'/>";
		echo "<input type='hidden' name='address1' value='$address1'/>";
		echo "<input type='hidden' name='address2' value='$address2'/>";
		echo "<input type='hidden' name='address3' value='$address3'/>";
		echo "<input type='hidden' name='pincode' value='$pincode'/>";
		echo "<input type='hidden' name='mobile' value='$mobile'/>";
		echo "<input type='hidden' name='landline' value='$landline'/>";
		echo "<input type='hidden' name='email' value='$email'/>";
		echo "<input type='hidden' name='doadd' value='$doadd'/>";
	        echo "<input type='hidden' name='doamm' value='$doamm'/>";
	        echo "<input type='hidden' name='doayyyy' value='$doayyyy'/>";
		echo "<input type='hidden' name='discount' value='$discount'/>";
		echo "<input type='hidden' name='remarks' value='$remarks'/>";
		echo "<input type='submit' name='submit' value='Check'>";
		echo "</form>";
	}
	else
	{
	 if($child1==NULL)
	 {
		$cflag=1;
	 }
	 else
	 {
		$cflag=2;
	 }
	 $flag=1;
	 echo "<form action='add_student_pop.php' method='POST'>";
	 echo"<input type='hidden' name='pid' value='$pid'/>";
	}
}
$y1=date('Y');
$dob=$dd."-".$mm."-".$yyyy;
$d1=$dd."-".$mm."-".$y1;
$y1=$y1+1;
$d2=$dd."-".$mm."-".$y1;
$y1=$y1+1;
$d3=$dd."-".$mm."-".$y1;
$y1=$y1+1;
$d4=$dd."-".$mm."-".$y1;
$y1=$y1+1;
$d5=$dd."-".$mm."-".$y1;
$doa=$doadd."-".$doamm."-".$doayyyy;

echo "<input type='hidden' name='course_name' value='$course'/>";
echo "<input type='hidden' name='medium' value='$medium'/>";
echo "<input type='hidden' name='fname' value='$fname'/>";
echo "<input type='hidden' name='mname' value='$mname'/>";
echo "<input type='hidden' name='sname' value='$sname'/>";
echo "<input type='hidden' name='dob' value='$dob'/>";
echo "<input type='hidden' name='doa' value='$doa'/>";
echo "<input type='hidden' name='d1' value='$d1'/>";
echo "<input type='hidden' name='d2' value='$d2'/>";
echo "<input type='hidden' name='d3' value='$d3'/>";
echo "<input type='hidden' name='d4' value='$d4'/>";
echo "<input type='hidden' name='d5' value='$d5'/>";
echo "<input type='hidden' name='gender' value='$gender'/>";
echo "<input type='hidden' name='mars' value='$mars'/>";
echo "<input type='hidden' name='qualification' value='$qualification'/>";
echo "<input type='hidden' name='sbi' value='$sbi'/>";
echo "<input type='hidden' name='branch' value='$branch'/>";
echo "<input type='hidden' name='address1' value='$address1'/>";
echo "<input type='hidden' name='address2' value='$address2'/>";
echo "<input type='hidden' name='address3' value='$address3'/>";
echo "<input type='hidden' name='pincode' value='$pincode'/>";
echo "<input type='hidden' name='mobile' value='$mobile'/>";
echo "<input type='hidden' name='landline' value='$landline'/>";
echo "<input type='hidden' name='email' value='$email'/>";
echo "<input type='hidden' name='discount' value='$discount'/>";
echo "<input type='hidden' name='remarks' value='$remarks'/>";
echo "<input type='hidden' name='cflag' value='$cflag'/>";
echo "<input type='hidden' name='abslevel' value='$abslevel'/>";
echo "<br/>";
echo "Select the batch";


function create_dropdown($identifier,$pairs)
{
   $dropdown="<select name=\"$identifier\"> ";
    
     
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
echo create_dropdown("batch_code",$pairs);

if($flag)
{
   echo "<input type='submit' name='submit' value='Submit'>";
}

echo "</form>";
?>

</body>
	</html>
