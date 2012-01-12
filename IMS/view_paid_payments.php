<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<title>View Paid Payments | Lead India Technologies</title>
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
				View <i>paid</i> payments
			</div>	
			
			<h1>The following payments are paid</h1>

			<div id="demo">
					
<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
	<thead>
		<tr>
			<th>Trans ID</th>
			<th>Student Id</th>
			<th>Amount</th>
			<th>Add Time</th>
			<th>SBI Account</th>
			<th>Paytime</th>
			<th>Remarks</th>
		</tr>

	</thead>
	<tbody>
		<?php
		include "dbinst.php";
		$dd1=$_POST['dd1'];
		$mm1=$_POST['mm1'];
		$yyyy1=$_POST['yyyy1'];
		$dd2=$_POST['dd2'];
		$mm2=$_POST['mm2'];
		$yyyy2=$_POST['yyyy2'];
		$start=mktime(01,01,01,$mm1,$dd1,$yyyy1);
		$end=mktime(01,01,01,$mm2,$dd2,$yyyy2);
		$query="SELECT TRANSID,STUDID,AMOUNT,ADDTIME,PAYTIME,REMARKS FROM payments WHERE STATUS='DONE' AND PAYTIME>$start AND PAYTIME<$end";
		$results=mysql_query($query);
		while(list($transid,$studid,$amount,$addtime,$paytime,$remarks)=mysql_fetch_row($results))
		{
			$query="SELECT SBI FROM students WHERE ID='$studid'";
			$results2=mysql_query($query);
			list($sbi)=mysql_fetch_row($results2);
				$addtime=date("d-m-Y, g:i a", $addtime);
				$paytime=date("d-m-Y, g:i a", $paytime);
				$transstr=str_pad($transid,8,"0",STR_PAD_LEFT);
				echo "<tr>";
					echo "<td>$transstr</td>";
					echo "<td>$studid</td>";
					echo "<td>$amount</td>";
					echo "<td>$addtime</td>";
					echo "<td>$sbi</td>";
					echo "<td>$paytime</td>";
					echo "<td>$remarks</td>";
				echo "</tr>";
					
				     
			
		}
		?>
	
	</tbody>
	<tfoot>

		<tr>
			<th>Trans ID</th>
			<th>Student Id</th>
			<th>Amount</th>
			<th>Add Time</th>
			<th>SBI Account</th>
			<th>Paytime</th>
			<th>Remarks</th>
		</tr>
	</tfoot>
</table>


			</div>
			<div class="spacer"></div>
			
			
</div>
	
		
	</body>
</html>

