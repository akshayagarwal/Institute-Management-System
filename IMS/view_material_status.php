<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<title>View Material Status | Lead India Technologies</title>
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
			
			<h1>The following materials are available</h1>

			<div id="demo">
<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
	<thead>
		<tr>
			<th>Material Code</th>
			<th>Material Name</th>
			<th>Quantity</th>
			<th>Add Time</th>
			<th>Remaining</th>
			<th>Remarks</th>
			
		</tr>

	</thead>
	<tbody>
		<?php
		include "dbinst.php";
		$query="SELECT MCODE,MATNAME,QUANTITY,ADDTIME,REMAIN,REMARKS FROM materials";
		$results=mysql_query($query);
		while(list($mcode,$matname,$quantity,$addtime,$remain,$remarks)=mysql_fetch_row($results))
		{
			$addtime=date("d-m-Y, g:i a", $addtime);
				echo "<tr>";
					echo "<td>$mcode</td>";
					echo "<td>$matname</td>";
					echo "<td>$quantity</td>";
					echo "<td>$addtime</td>";
					echo "<td>$remain</td>";
					echo "<td>$remarks</td>";		
				echo "</tr>";
					
				     
			
		}
		?>
	
	</tbody>
	<tfoot>

		<tr>
			<th>Material Code</th>
			<th>Material Name</th>
			<th>Quantity</th>
			<th>Add Time</th>
			<th>Remaining</th>
			<th>Remarks</th>
		</tr>
	</tfoot>
</table>

			</div>
			<div class="spacer"></div>
			
			
</div>
	
	
		
	</body>
</html>

