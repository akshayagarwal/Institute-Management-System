<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<title>View Course | Lead India Technologies</title>
	<style type="text/css" title="currentStyle">
			@import "media/css/demo_page.css";
			@import "media/css/demo_table.css";
	</style>

	<script type="text/javascript" language="javascript" src="media/js/jquery.js"></script>
	<script type="text/javascript" language="javascript" src="media/js/jquery.dataTables.js"></script>
	<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#example').dataTable( {
					"bProcessing": true,
					"bServerSide": true,
					"sAjaxSource": "view_course3.php"
				} );
			} );
		</script>

</head>

<body id="dt_example">
		<div id="container">
			<div class="full_width big">

				<i>DataTables</i> server-side processing example
			</div>
			
			<h1>Preamble</h1>
			<p>There are many ways to get your data into DataTables, and if you are working with seriously large databases, you might want to consider using the server-side options that DataTables provides. Basically all of the paging, filtering, sorting etc that DataTables does can be handed off to a server (or any other data source - Google Gears or Adobe Air for example!) and DataTables is just an events and display module.</p>
			<p>The example here shows a very simple display of the CSS data (used in all my other examples), but in this instance coming from the server on each draw. Filtering, multi-column sorting etc all work as you would expect.</p>
			
			<h1>Live example</h1>

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
		<tr>
			<td colspan="5" class="dataTables_empty">Loading data from server</td>
		</tr>
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

