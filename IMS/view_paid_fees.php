<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<title>View Paid Fees | Lead India Technologies</title>
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
		  	
		<div id="container">
			<div class="full_width big">
				View <i>paid</i> fees  
			</div>	
			
			<h1>The following fees are paid</h1>

			<div id="demo">
<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
	<thead>
		<tr>
			<th>Recipt No.</th>
			<th>Student Name</th>
			<th>Student Id</th>
			<th>Course</th>
			<th>Amount</th>
			<th>Date</th>
			<th>Remarks</th>
			
		</tr>

	</thead>
	<tbody>
		<?php
		$dd1=$_POST['dd1'];
		$mm1=$_POST['mm1'];
		$yyyy1=$_POST['yyyy1'];
		$dd2=$_POST['dd2'];
		$mm2=$_POST['mm2'];
		$yyyy2=$_POST['yyyy2'];
		$start=mktime(01,01,01,$mm1,$dd1,$yyyy1);
		$end=mktime(01,01,01,$mm2,$dd2,$yyyy2);
		include "dbinst.php";
		$query="SELECT RNO,STUDID,AMOUNT,DOP,REMARKS FROM fees WHERE TIME>$start AND TIME<$end";
		$results=mysql_query($query);
		while(list($rno,$studid,$amount,$dop,$remarks)=mysql_fetch_row($results))
		{
			$query="SELECT NAME,COURSE FROM students WHERE ID='$studid'";
			$results2=mysql_query($query);
			list($name,$course)=mysql_fetch_row($results2);
			//$ptime=date("d-m-Y, g:i a", $ptime);
				echo "<tr>";
					echo "<td>$rno</td>";
					echo "<td>$name</td>";
					echo "<td>$studid</td>";
					echo "<td>$course</td>";
					echo "<td>$amount</td>";
					echo "<td>$dop</td>";
					echo "<td>$remarks</td>";		
				echo "</tr>";
					
				     
			
		}
		?>
	
	</tbody>
	<tfoot>

		<tr>
			<th>Recipt No.</th>
			<th>Student Name</th>
			<th>Student Id</th>
			<th>Course</th>
			<th>Amount</th>
			<th>Date</th>
			<th>Remarks</th>
		</tr>
	</tfoot>
</table>

			</div>
			<div class="spacer"></div>
			
			
</div>
	
	
		
	</body>
</html>

