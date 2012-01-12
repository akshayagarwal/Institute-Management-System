<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<title>View Enquries | Lead India Technologies</title>
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
		<SCRIPT LANGUAGE="JavaScript">
<!-- 	

// This script checks and unchecks boxes on a form
// Checks and unchecks unlimited number in the group...
// Pass the Checkbox group name...
// call buttons as so:
// <input type=button name="CheckAll"   value="Check All"
	//onClick="checkAll(document.myform.list)">
// <input type=button name="UnCheckAll" value="Uncheck All"
	//onClick="uncheckAll(document.myform.list)">
// -->

<!-- Begin
function checkAll(field)
{
for (i = 0; i < field.length; i++)
	field[i].checked = true ;
}

function uncheckAll(field)
{
for (i = 0; i < field.length; i++)
	field[i].checked = false ;
}
//  End -->
</script>


</head>

	<body id="dt_example">
		<?php
		$dd1=$_POST['dd1'];
		$mm1=$_POST['mm1'];
		$yyyy1=$_POST['yyyy1'];
		$dd2=$_POST['dd2'];
		$mm2=$_POST['mm2'];
		$yyyy2=$_POST['yyyy2'];
		$start=mktime(01,01,01,$mm1,$dd1,$yyyy1);
		$end=mktime(01,01,01,$mm2,$dd2,$yyyy2);
		//echo "Start : $start, End: $end";
		?>
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
		$query="SELECT ID,NAME,COURSE,BATCH,REMARKS,MOBILE,FNAME FROM enquiries WHERE TIME>$start AND TIME<$end AND STATUS='ENQUIRED'";
		$results=mysql_query($query);
		while(list($id,$name,$course,$batch,$remarks,$mobile,$fname)=mysql_fetch_row($results))
		{
			
	   	$ure2 = "http://smscgateway.com/messageapi.asp?username=sunnycomputers&password=tamanna&sender=SUNNYCOM&mobile=".$mobile."&message=Dear%20".$fname.",This%20is%20to%20remind%20you%20of%20your%20enquiry%20about%20".$course."%20Please%20make%20your%20admission%20soon%20to%20ensure%20your%20preferred%20batch";
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
				View <i>enquiries</i>  
			</div>	
			
			<h1>The following enquiries are made</h1>

			<div id="demo">
			<form action="view_enquiries.php" method="post" name="myform">		
<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
	<thead>
		<tr>
			<th>Name</th>
			<th>Enquiry Id</th>
			<th>Course</th>
			<th>Batch</th>
			<th>Remarks</th>
			<th>Reminder SMS</th>
			
		</tr>

	</thead>
	<tbody>
		<?php
		include "dbinst.php";
		$query="SELECT ID,NAME,COURSE,BATCH,REMARKS,MOBILE,FNAME,STATUS FROM enquiries WHERE TIME>$start AND TIME<$end";
		$results=mysql_query($query);
		while(list($id,$name,$course,$batch,$remarks,$mobile,$fname,$status)=mysql_fetch_row($results))
		{
			if(!strcmp($status,"ADMITTED"))
			{
	   	        $ure2 = "http://smscgateway.com/messageapi.asp?username=sunnycomputers&password=tamanna&sender=SUNNYCOM&mobile=".$mobile."&message=Dear%20".$fname."This%20is%20to%20remind%20you%20of%20your%20enquiry%20about%20".$course."%20Please%20make%20your%20admission%20soon%20to%20ensure%20your%20preferred%20batch";
				
				echo "<tr>";
					echo "<td>$name</td>";
					echo "<td>$id</td>";
					echo "<td>$course</td>";
					echo "<td>$batch</td>";
					echo "<td>$remarks</td>";
					echo "<td>$status</td>";
					echo "<td class='center'><input type='checkbox' name='alertto[]' value='$ure2'/></td>";
				echo "</tr>";
					
			}	     
			
		}
		?>
	
	</tbody>
	<tfoot>

		<tr>
			<th>Name</th>
			<th>Enquiry Id</th>
			<th>Course</th>
			<th>Batch</th>
			<th>Remarks</th>
			<th>Reminder SMS</th>
		</tr>
	</tfoot>
</table>
<br>
<input type="hidden" name="dd1" value="<?php echo $dd1 ?>"/>
<input type="hidden" name="mm1" value="<?php echo $mm1 ?>"/>
<input type="hidden" name="yyyy1" value="<?php echo $yyyy1 ?>"/>
<input type="hidden" name="dd2" value="<?php echo $dd2 ?>"/>
<input type="hidden" name="mm2" value="<?php echo $mm2 ?>"/>
<input type="hidden" name="yyyy2" value="<?php echo $yyyy2 ?>"/>
<br>

<input type="submit" name="submit" value="Send Reminder SMS to selected!">
	<br>
		<input type="submit" name="submit2" value="Send Reminder SMS to All!"/>
</form>


			</div>
			<div class="spacer"></div>
			
			
</div>
	
	
		
	</body>
</html>

