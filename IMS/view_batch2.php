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
	var oTable;

			$(document).ready(function() {
				$('#example tbody td').hover( function() {
				var iCol = $('td').index(this) % 5;
				var nTrs = oTable.fnGetNodes();
				$('td:nth-child('+(iCol+1)+')', nTrs).addClass( 'highlighted' );
				}, function() {
				var nTrs = oTable.fnGetNodes();
				$('td.highlighted', nTrs).removeClass('highlighted');
				} );

				oTable =$('#example').dataTable( {
					"bJQueryUI": true,
					"bProcessing": true,
					"bServerSide": true,
					"sAjaxSource": "view_batch_p.php"
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
		<tr>
			<td colspan="5" class="dataTables_empty">Loading data from server</td>
		</tr>
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

