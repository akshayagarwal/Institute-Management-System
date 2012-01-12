<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<title>View Batches</title>
	<style type="text/css" title="currentStyle">
			@import "media/css/demo_page.css";
			@import "media/css/demo_table.css";
			@import "examples_support/themes/smoothness/jquery-ui-1.7.2.custom.css";

	</style>

	<script type="text/javascript" language="javascript" src="media/js/jquery.js"></script>
	<script type="text/javascript" language="javascript" src="media/js/jquery.dataTables.js"></script>
	<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#example').dataTable( {
					"bJQueryUI": true,
					"sPaginationType": "full_numbers"
				} );
			} );
			
		</script>
</head>

<body id="dt_example">
		<div id="container">
			
			
			<h1>Available Batches</h1>

			<div id="dynamic">
<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
	<thead>
		<tr>
			<th width="20%">Batch Code</th>
			<th width="25%">Course</th>
			<th width="15%">Start Time</th>
			<th width="15%">End Time</th>
			<th width="15%">Strength</th>
			<th width="15%">Admissions</th>
			<th width="15%">Enquiries</th>
		</tr>
	</thead>
	<tbody>
		<?php
		include "dbinst.php";
		$query="SELECT ID, COURSE, START, END, STRENGTH, ADMISSIONS, ENQUIRIES FROM batches";
		$results=mysql_query($query);
		while(list($id,$course,$start,$end,$strength,$admissions,$enquiries)=mysql_fetch_row($results))
		{
				
				echo "<tr>";
					echo "<td>$id</td>";
					echo "<td>$course</td>";
					echo "<td>$start</td>";
					echo "<td>$end</td>";
					echo "<td>$strength</td>";
					echo "<td>$admissions</td>";
					echo "<td>$enquiries</td>";
				echo "</tr>";
					
				     
			
		}
		?>
		
	</tbody>
                
	<tfoot>
		<tr>
			<th>Batch Code</th>
			<th>Course</th>
			<th>Start Time</th>
			<th>End Time</th>
			<th>Strength</th>
			<th>Admissions</th>
			<th>Enquiries</th>
		</tr>
	</tfoot>
</table>
			</div>
			<div class="spacer"></div>
</div>
				
</body>
</html>
