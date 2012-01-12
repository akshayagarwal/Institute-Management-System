<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<title>Add New Student | Lead India Technologies</title>
</head>

<body>

<?php
include "dbinst.php";
$pid=$_POST['pid'];
$course=$_POST['course_name'];
$medium=$_POST['medium'];
$batch=$_POST['batch_code'];
$fname=$_POST['fname'];
$mname=$_POST['mname'];
$sname=$_POST['sname'];
$dob=$_POST['dob'];
$doa=$_POST['doa'];
$qualification=mysql_real_escape_string($_POST['qualification']);
$d1=$_POST['d1'];
$d2=$_POST['d2'];
$d3=$_POST['d3'];
$d4=$_POST['d4'];
$d5=$_POST['d5'];
$gender=$_POST['gender'];
$mars=$_POST['mars'];
$sbi=$_POST['sbi'];
$branch=$_POST['branch'];
$address1=mysql_real_escape_string($_POST['address1']);
$address2=mysql_real_escape_string($_POST['address2']);
$address3=mysql_real_escape_string($_POST['address3']);
$pincode=$_POST['pincode'];
$mobile=$_POST['mobile'];
$landline=$_POST['landline'];
$email=$_POST['email'];
$cflag=$_POST['cflag'];
$discount=$_POST['discount'];
$remarks=$_POST['remarks'];
$abslevel=$_POST['abslevel'];

/******************** SET ABSLEVEL AS PARENT ABSLEVEL + 1 ***********************************/
$abslevel=$abslevel+1;
function schedule_payment($id,$level)
{
	//echo "Entered schedule payment";
	$query="SELECT COUNT(*) FROM payments";
	$results=mysql_query($query);
	list($transid)=mysql_fetch_row($results);
	$transid=$transid+1;
	$transid=str_pad($transid,8,"0",STR_PAD_LEFT);
	$atime=time();
	if($level==1)
	{
		$points=20;
	}
	else if($level==2)
	{
		$points=20;
	}
	else if($level==3)
	{
		$points=16;
	}
	else if($level>=4)
	{
	  $total=pow(2,$level);
	  $points=$total;
	}
	$amount=$points*5;
	$query="INSERT INTO payments SET TRANSID='$transid',STUDID='$id',POINTS='$points',AMOUNT='$amount',STATUS='PENDING',ADDTIME='$atime',REMARKS='PAYMENT FOR COMPLETING LEVEL $level'";
	$results=mysql_query($query);
	if($results)
	{
		return "Success";
	}
	else
	{
		return "Failed";
	}
}

function check_payment($pid,$abslevel)
{
	//echo "Entered check_pay";
	$pflag=1;
	$count=1;
	while($abslevel>0)
	{
		$query="SELECT "."LEVEL".$count.",PID FROM students WHERE ID='$pid'";
		$results=mysql_query($query);
		list($m,$n_pid)=mysql_fetch_row($results);
		//echo "Its $m";
		$m=$m+1;
		$query="UPDATE students SET "."LEVEL".$count."=$m WHERE ID='$pid'";
		$results=mysql_query($query);
		if($pflag)
		{
			if($m==pow(2,$count))
			{
				//echo "entered inner if";
				$st=schedule_payment($pid,$count);
				$pflag=1;
				
			}
			else
			{
				$pflag=0;
			}
		}
		$pid=$n_pid;
		$abslevel--;
		$count++;
	}
}

function generate_pass ($length = 8)
{

  // start with a blank password
  $password = "";

  // define possible characters
  $possible = "0123456789bcdfghjkmnpqrstvwxyz"; 
    
  // set up a counter
  $i = 0; 
    
  // add random characters to $password until $length is reached
  while ($i < $length) { 

    // pick a random character from the possible ones
    $char = substr($possible, mt_rand(0, strlen($possible)-1), 1);
        
    // we don't want this character if it's already in the password
    if (!strstr($password, $char)) { 
      $password .= $char;
      $i++;
    }

  }

  // done!
  return $password;

}

$password=generate_pass();

$name=$fname." ".substr($mname,0,1)." ".$sname;

$id=substr($fname,0,1);
$id=$id.substr($sname,0,1);
$query="SELECT ID,STUDENTS FROM courses WHERE NAME='$course'";
$results=mysql_query($query);
list($i,$c)=mysql_fetch_row($results);
$c=$c+1;
$query="UPDATE courses SET STUDENTS='$c' WHERE ID='$i'";
$results=mysql_query($query);
$c=str_pad($c,5,"0",STR_PAD_LEFT);
$id=$id.$i.$c;
$ptime=time();
$query="INSERT INTO students SET PID='$pid',ID='$id',COURSE='$course',COURSE_STATUS='ACTIVE',BATCH='$batch',NAME='$name',FNAME='$fname',MNAME='$mname',LNAME='$sname',DOB='$dob',GENDER='$gender',SBI='$sbi',BRANCH='$branch',ADDRESS1='$address1',ADDRESS2='$address2',ADDRESS3='$address3',PINCODE='$pincode',MOBILE='$mobile',LANDLINE='$landline',EMAIL='$email',PASSWORD='$password',TIME=$ptime,REMARKS='$remarks',ABSLEVEL=$abslevel,MARS='$mars',QUALIFICATION='$qualification',DOA='$doa',DISCOUNT=$discount,MEDIUM=$medium";
$results=mysql_query($query);
if($results)
{
	$query="SELECT PAYELIG,FEESFLAG,CHILD1,CHILD2 FROM students WHERE ID='$pid'";
	$results=mysql_query($query);
	list($payelig,$feesflag,$child1,$child2)=mysql_fetch_row($results);
	if($payelig!=1)
	{
		if($feesflag!=0 AND $child1!=NULL AND $child2!=NULL)
		{
			$query="UPDATE students SET PAYELIG=1 WHERE ID='$pid'";
		}
	}
	$query="UPDATE courses SET STUDENTS='$c' WHERE ID='$i'";
        $results=mysql_query($query);
	$query="SELECT ADMISSIONS FROM batches WHERE ID='$batch'";
	$results=mysql_query($query);
	list($a)=mysql_fetch_row($results);
	$a=$a+1;
	$query="UPDATE batches SET ADMISSIONS='$a' WHERE ID='$batch'";
        $results=mysql_query($query);
	if($cflag==1)
	{
	     $query="UPDATE students SET CHILD1='$id' WHERE ID='$pid'";
	}
	else
	{
	     $query="UPDATE students SET CHILD2='$id' WHERE ID='$pid'";
	}
	$results=mysql_query($query);
	check_payment($pid,$abslevel);
	
	/****************SEND SMS TO STUDENT FOR REGISTRATION CONFIRMATION***********************/ 
	/*************DONT FORGET TO USE %20 FOR ALL SPACES IN THE SMS STRING*********************/
	$url = "http://smscgateway.com/messageapi.asp?username=sunnycomputers&password=tamanna&sender=SUNNYCOM&mobile=".$mobile."&message=Dear%20".$fname.",Congratulations!%20You%20have%20been%20registered%20successfully%20with%20Sunny%20Computers,Yaval.%20Your%20registration%20ID%20is%20".$id."%20";
   		
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
	echo "<b>New Student Added Successfully!";
	echo "<br/>";
	echo "<b>Student Name:<strong> $fname ".$mname." ".$sname;
	echo "<br/>";
	echo "<b>Registration ID:<strong> $id";
	echo "<br/>";
	echo "<form action='../../../print_welcome2.php' method='post' target='_blank'>";
	echo "<input type='hidden' name='id' value='$id'>";
	echo "<input type='submit' name='submit' value='Print Welcome Kit'/>";
	echo "</form>";
	
}
else
{
	echo "\n Couldn't Add New Student, Kindly Refresh or Try Again";
}
?>
</body>
</html>
