<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<title>Add New Course | Lead India Technologies</title>
<link rel="stylesheet" href="../jquery.treeview.css" />
<link rel="stylesheet" href="../red-treeview.css" />
<link rel="stylesheet" href="screen.css" />

<script src="lib/jquery.js" type="text/javascript"></script>
<script src="lib/jquery.cookie.js" type="text/javascript"></script>
<script src="jquery.treeview.js" type="text/javascript"></script>
<script src="jquery.validate.js" type="text/javascript"></script>

<script src="js/cmxforms.js" type="text/javascript"></script>

<script type="text/javascript">
	// extend the current rules with new groovy ones
	
	// this one requires the text "buga", we define a default message, too
	$.validator.addMethod("buga", function(value) {
		return value == "buga";
	}, 'Please enter "buga"!');
	
	// this one requires the value to be the same as the first parameter
	$.validator.methods.equal = function(value, element, param) {
		return value == param;
	};
	
	$().ready(function() {
		var validator = $("#texttests").bind("invalid-form.validate", function() {
			$("#summary").html("Your form contains " + validator.numberOfInvalids() + " errors, see details below.");
		}).validate({
			debug: true,
			errorElement: "em",
			errorContainer: $("#warning, #summary"),
			errorPlacement: function(error, element) {
				error.appendTo( element.parent("td").next("td") );
			},
			success: function(label) {
				label.text("ok!").addClass("success");
			},
			rules: {
				number: {
					required:true,
					minLength:3,
					maxLength:15,
					number:true	
				},
				secret: "buga",
				math: {
					equal: 11	
				}
			}
		});
		
	});
</script>

<style type="text/css">
form.cmxform { width: 50em; }
em.error {
  background:url("images/unchecked.gif") no-repeat 0px 0px;
  padding-left: 16px;
}
em.success {
  background:url("images/checked.gif") no-repeat 0px 0px;
  padding-left: 16px;
}

form.cmxform label.error {
	margin-left: auto;
	width: 250px;
}
em.error { color: black; }
#warning { display: none; }
</style>


<script type="text/javascript">
		$(function() {
			$("#tree").treeview({
				collapsed: true,
				animated: "fast",
				control:"#sidetreecontrol",
				persist: "location"
			});
		})
		
	</script>
</head>

<body>
<div id="main">
	<h2>Enter New Course Details</h2>
<form class="cmxform" id="texttests" action="add_course_p.php" method="post">
	<fieldset>
		<legend>Course Details</legend>
		<table>
			<h2 id="summary"></h2>

			<tr>
				<td>
		                    <label for="number">Course Name</label>
				</td>
				<td>
					<input type="text" name="course_name" id="course_name"/><br/>    
				</td>
			</tr>
			<tr>
			        <td>
				      <label for="course_code">Course Code</label>
				</td>
				<td>
					<input type="text" name="course_code" id="course_code" size="3" maxlength="2"/><br/>
				</td>
			</tr>
			<tr>
				<td>
				    <label for="course_contents">Contents</label>
				</td>
				<td>
				       <textarea name="course_contents" id="course_contents" rows="5" cols="40"></textarea><br/>
				</td>
			</tr>
			<tr>
			        <td>
				      <label for="course_duration">Course Duration</label>
				</td>
				<td>
					<input type="text" name="course_duration" id="course_duration" size="5" maxlength="5"> months<br/>
				</td>
			</tr>
			<tr>
				<td>
				    <label for="course_fees">Fees</label>
				</td>
				<td>
				       <input type="text" name="course_fees" id="course_fees" size="10" maxlength="10"> Rs<br/>
				</td>
			</tr>
			<tr>
				<td align="right">
					<input type="submit" name="submit" value="Add">
				</td>
				<td>
					<input type="reset" name="reset" value="Reset">
				</td>
			</tr>
				
		</table>
		
	</fieldset>
</form>
<h3 id="warning">Your form contains tons of errors! Please try again.</h3>
</div>

</body>
</html>
