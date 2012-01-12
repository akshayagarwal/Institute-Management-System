<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<title>View Pending Fees | Lead India Technologies</title>
	<style type="text/css" title="currentStyle">
			@import "media/css/demo_page.css";
			@import "media/css/demo_table.css";
			@import "examples_support/themes/smoothness/jquery-ui-1.7.2.custom.css";

	</style>

	<script type="text/javascript" language="javascript" src="media/js/jquery.js"></script>
	<script type="text/javascript" language="javascript" src="media/js/jquery.dataTables.js"></script>
		<script type="text/javascript" charset="utf-8">
			var oTable;
			
			$(document).ready(function() {	
				oTable = $('#example').dataTable();
			} );
		</script>
</head>

	<body id="dt_example">
		<?php
		include "dbinst.php";
		if (isset($_POST['submit']))
		{
			//echo "Entered isset";
			foreach($_POST['alertto'] AS $ure2)
			{
				$url=$ure2;
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
			}
		}
		if (isset($_POST['submit2']))
		{
		$query="SELECT ID,NAME,COURSE,FEESPAID,LFTIME,MOBILE,FNAME,DISCOUNT FROM students WHERE FEESFLAG='0'";
		$results=mysql_query($query);
		while(list($studid,$name,$course,$feespaid,$lftime,$mobile,$fname,$discount)=mysql_fetch_row($results))
		{
			
	   	$query="SELECT FEES FROM courses WHERE NAME='$course'";
			$results2=mysql_query($query);
			list($fees)=mysql_fetch_row($results2);
			
				$query="SELECT AMOUNT FROM fees WHERE STUDID='$studid' AND TIME='$lftime'";
				$results3=mysql_query($query);
				list($amount)=mysql_fetch_row($results3);
				$remaining=$fees-$discount-$feespaid;
				$ure2 = "http://smscgateway.com/messageapi.asp?username=sunnycomputers&password=tamanna&sender=SUNNYCOM&mobile=".$mobile."&message=Dear%20".$fname.",%20Your%20payment%20of%20Rs%20".$remaining."%20towards%20".$course."%20course%20is%20pending.Kindly%20pay%20soon%20to%20start%20enjoying%20referral%20benefits";
		                  $url=$ure2;
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
		}
		}
			
		?>		
		  
		
		
		
		<div id="container">
			<div class="full_width big">
				View <i>pending</i> fees  
			</div>	
			
			<h1>The following fees are pending</h1>

			<div id="demo">
			<form action="view_pending_fees.php" method="post">		
<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
	<thead>
		<tr>
			<th>Student Name</th>
			<th>Student Id</th>
			<th>Course</th>
			<th>Fees Remaining</th>
			<th>Last Installment</th>
			<th>Alert SMS</th>
			
		</tr>

	</thead>
	<tbody>
		<?php
		include "dbinst.php";
		$query="SELECT ID,NAME,COURSE,FEESPAID,LFTIME,MOBILE,FNAME,DISCOUNT FROM students WHERE FEESFLAG='0'";
		$results=mysql_query($query);
		while(list($studid,$name,$course,$feespaid,$lftime,$mobile,$fname,$discount)=mysql_fetch_row($results))
		{
			$query="SELECT FEES FROM courses WHERE NAME='$course'";
			$results2=mysql_query($query);
			list($fees)=mysql_fetch_row($results2);
			
				$query="SELECT AMOUNT,DOP FROM fees WHERE STUDID='$studid' AND TIME='$lftime'";
				$results3=mysql_query($query);
				list($amount,$dop)=mysql_fetch_row($results3);
				$remaining=$fees-$discount-$feespaid;
				$ure2 = "http://smscgateway.com/messageapi.asp?username=sunnycomputers&password=tamanna&sender=SUNNYCOM&mobile=".$mobile."&message=Dear%20".$fname.",%20Your%20payment%20of%20Rs%20".$remaining."%20towards%20".$course."%20course%20is%20pending.Kindly%20pay%20soon%20to%20start%20enjoying%20referral%20benefits";
				if($lftime>0)
				{
				$lftime=date("d-m-Y, g:i a", $lftime);
				$last="Rs ".$amount." on ".$dop;
				}
				else
				{
					$last="NIL";
				}
				echo "<tr>";
					echo "<td>$name</td>";
					echo "<td>$studid</td>";
					echo "<td>$course</td>";
					echo "<td>$remaining</td>";
					echo "<td>$last</td>";
					echo "<td class='center'><input type='checkbox' name='alertto[]' value='$ure2'/></td>";
				echo "</tr>";
					
				     
			
		}
		?>
	
	</tbody>
	<tfoot>

		<tr>
			<th>Student Name</th>
			<th>Student Id</th>
			<th>Course</th>
			<th>Fees Remaining</th>
			<th>Last Installment</th>
			<th>Alert SMS</th>
		</tr>
	</tfoot>
</table>
<input type="submit" name="submit" value="Send Alert SMS!">
	<br>
		<input type="submit" name="submit2" value="Send Alert SMS to All!"/>
</form>
</form>


			</div>
			<div class="spacer"></div>
			
			
</div>
	
	
		
	</body>
</html>

