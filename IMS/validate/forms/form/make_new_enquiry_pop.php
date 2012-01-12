<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<title>Make New Enquiry | Lead India Technologies</title>
</head>

<body>

<?php
include "dbinst.php";
$course=$_POST['course_name'];
$batch=$_POST['batch_code'];
$fname=$_POST['fname'];
$mname=$_POST['mname'];
$sname=$_POST['sname'];
$dob=$_POST['dob'];
$gender=$_POST['gender'];
$address1=mysql_real_escape_string($_POST['address1']);
$address2=mysql_real_escape_string($_POST['address2']);
$address3=mysql_real_escape_string($_POST['address3']);
$pincode=$_POST['pincode'];
$mobile=$_POST['mobile'];
$landline=$_POST['landline'];
$email=$_POST['email'];
$remarks=$_POST['remarks'];
$source_name=$_POST['source_name'];
$name=$fname." ".substr($mname,0,1)." ".$sname;
//echo "Mobile is $mobile";
$id=substr($fname,0,1);
$id=$id.substr($sname,0,1);
$query="SELECT ID,ENQUIRIES,FEES FROM courses WHERE NAME='$course'";
$results=mysql_query($query);
list($i,$c,$fees)=mysql_fetch_row($results);
$c=$c+1;
$c=str_pad($c,5,"0",STR_PAD_LEFT);
$id="EN".$id.$i.$c;
$ptime=time();
$query="INSERT INTO enquiries SET ID='$id',COURSE='$course',BATCH='$batch',NAME='$name',FNAME='$fname',MNAME='$mname',LNAME='$sname',DOB='$dob',GENDER='$gender',ADDRESS1='$address1',ADDRESS2='$address2',ADDRESS3='$address3',PINCODE='$pincode',MOBILE='$mobile',LANDLINE='$landline',EMAIL='$email',TIME=$ptime,REMARKS='$remarks',SOURCE='$source_name'";
$results=mysql_query($query);
if($results)
{
	$query="UPDATE courses SET ENQUIRIES='$c' WHERE ID='$i'";
        $results=mysql_query($query);
	$query="SELECT ENQUIRIES FROM batches WHERE ID='$batch'";
	$results=mysql_query($query);
	list($a)=mysql_fetch_row($results);
	$a=$a+1;
	$query="UPDATE batches SET ENQUIRIES='$a' WHERE ID='$batch'";
        $results=mysql_query($query);
	$query="SELECT ENQUIRIES FROM eqsource WHERE NAME='$source_name'";
	$results=mysql_query($query);
	list($a)=mysql_fetch_row($results);
	$a=$a+1;
	$query="UPDATE eqsource SET ENQUIRIES='$a' WHERE NAME='$source_name'";
        $results=mysql_query($query);
	
	
	
	/****************SEND SMS TO STUDENT FOR ENQUIRY CONFIRMATION***********************/ 
	/*************DONT FORGET TO USE %20 FOR ALL SPACES IN THE SMS STRING*********************/
	$url = "http://smscgateway.com/messageapi.asp?username=sunnycomputers&password=tamanna&sender=SUNNYCOM&mobile=".$mobile."&message=Dear%20".$fname.",Thankyou%20for%20enquiring%20about%20".$course."%20Course%20Fees%20only%20Rs%20".$fees."%20";
   		
 		// create a new cURL resource
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

		// close cURL resource, and free up system resources
		//curl_close($ch);
		
	echo "<br/>";
	echo "<b>New Enquiry Made Successfully!";
	echo "<br/>";
	echo "<b>Student Name:<strong> $fname ".$mname." ".$sname;
	echo "<br/>";
	echo "<b>Enquiry ID:<strong> $id";
	echo "<br/>";
	echo "<form action='../../../print_enquiry.php' method='post' target='_blank'>";
	echo "<input type='hidden' name='id' value='$id'>";
	echo "<input type='submit' name='submit' value='Print Enquiry Kit'/>";
	echo "</form>";
}
else
{
	echo "\n Couldn't Make New Enquiry, Kindly Refresh or Try Again";
}
?>
</body>
</html>
