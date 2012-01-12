<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<title>View Students | Lead India Technologies</title>
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
			
			
			<h1>Registered Students</h1>

			<div id="dynamic">
<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
	<thead>
		<tr>
			<th width="20%">Student Name</th>
			<th width="25%">ID</th>
			<th width="25%">Course</th>
			<th width="15%">Batch</th>
			<th width="15%">Ref1</th>
			<th width="15%">Ref2</th>
			<th width="15%">Mobile</th>
		</tr>
	</thead>
	<tbody>
		
			<?php
		include "dbinst.php";
		$query="SELECT NAME, ID, COURSE, BATCH, CHILD1, CHILD2, MOBILE FROM students";
		$results=mysql_query($query);
		while(list($name,$id,$course,$batch,$child1,$child2,$mobile)=mysql_fetch_row($results))
		{
				
				echo "<tr>";
					echo "<td>$name</td>";
					echo "<td>$id</td>";
					echo "<td>$course</td>";
					echo "<td>$batch</td>";
					echo "<td>$child1</td>";
					echo "<td>$child2</td>";
					echo "<td>$mobile</td>";
				echo "</tr>";
					
				     
			
		}
		?>
		
	</tbody>

	<tfoot>
		<tr>
			<th width="20%">Student Name</th>
			<th width="25%">ID</th>
			<th width="25%">Course</th>
			<th width="15%">Batch</th>
			<th width="15%">Ref1</th>
			<th width="15%">Ref2</th>
			<th width="15%">Mobile</th>

		</tr>
	</tfoot>
</table>
			</div>
			<div class="spacer"></div>
</div>
		</body>
</html>

