<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<title>View Course | Lead India Technologies</title>
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
			
			
			<h1>Available Courses</h1>

			<div id="dynamic">
<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
	<thead>
		<tr>
			<th width="20%">Course Name</th>
			<th width="25%">ID</th>
			<th width="25%">Duration</th>
			<th width="15%">Fees</th>
			<th width="15%">Batches</th>
			<th width="15%">Students</th>
		</tr>
	</thead>
	<tbody>
		<?php
		include "dbinst.php";
		$query="SELECT NAME, ID, DURATION, FEES, BATCHES, STUDENTS FROM courses";
		$results=mysql_query($query);
		while(list($name,$id,$duration,$fees,$batches,$students)=mysql_fetch_row($results))
		{
				
				echo "<tr>";
					echo "<td>$name</td>";
					echo "<td>$id</td>";
					echo "<td>$duration</td>";
					echo "<td>$fees</td>";
					echo "<td>$batches</td>";
					echo "<td>$students</td>";
				echo "</tr>";
					
				     
			
		}
		?>
	</tbody>

	<tfoot>
		<tr>
			<th>Course Name</th>
			<th>ID</th>
			<th>Duration</th>
			<th>Fees</th>
			<th>Batches</th>
			<th>Students</th>

		</tr>
	</tfoot>
</table>
			</div>
			<div class="spacer"></div>
</div>
		</body>
</html>

