<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<title>View Issued Material | Lead India Technologies</title>
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
				View <i>material</i> status  
			</div>	
			
			<h1>The following materials are issued</h1>

			<div id="demo">
<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
	<thead>
		<tr>
			<th>MTRANS ID</th>
			<th>Student ID</th>
			<th>Material Code</th>
			<th>Material Name</th>
			<th>Quantity</th>
			<th>Issue Time</th>
			<th>Remarks</th>
			
		</tr>

	</thead>
	<tbody>
		<?php
		include "dbinst.php";
		$query="SELECT * FROM missue";
		$results=mysql_query($query);
		while(list($mtransid,$studid,$mcode,$matname,$quantity,$itime,$remarks)=mysql_fetch_row($results))
		{
			$itime=date("d-m-Y, g:i a", $itime);
				echo "<tr>";
					echo "<td>$mtransid</td>";
					echo "<td>$studid</td>";
					echo "<td>$mcode</td>";
					echo "<td>$matname</td>";
					echo "<td>$quantity</td>";
					echo "<td>$itime</td>";
					echo "<td>$remarks</td>";		
				echo "</tr>";
					
				     
			
		}
		?>
	
	</tbody>
	<tfoot>

		<tr>
			<th>MTRANS ID</th>
			<th>Student ID</th>
			<th>Material Code</th>
			<th>Material Name</th>
			<th>Quantity</th>
			<th>Issue Time</th>
			<th>Remarks</th>
		</tr>
	</tfoot>
</table>

			</div>
			<div class="spacer"></div>
			
			
</div>
	
	
		
	</body>
</html>

