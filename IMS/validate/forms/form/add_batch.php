<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<title>Add New Batch | Lead India Technologies</title>
	<link rel="stylesheet" type="text/css" media="screen" href="milk.css" />
<link rel="stylesheet" type="text/css" media="screen" href="../css/chili.css" />

<script src="../../lib/jquery.js" type="text/javascript"></script>
<script src="../../jquery.validate.js" type="text/javascript"></script>

<style type="text/css">
	pre { text-align: left; }
</style>

<script id="demo" type="text/javascript">
$(document).ready(function() {
	// validate signup form on keyup and submit
	var validator = $("#signupform").validate({
		rules: {
			batch_code:{
				     required: true,
				     minlength: 4
			},
			course_name:{
				     required: true
			},
			start_time:{
				     required: true,
				     min: 1,
				     max: 12,
				     digit: true
			},
			end_time:{
				     required: true,
				     min: 1,
				     max: 12,
				     digit: true
			},
			batch_strength:{
				     required: true,
				     digit: true
			},
			username: {
				required: true,
				minlength: 2,
				remote: "users.php"
			},
			password: {
				required: true,
				minlength: 5
			},
			password_confirm: {
				required: true,
				minlength: 5,
				equalTo: "#password"
			},
			email: {
				required: true,
				email: true,
				remote: "emails.php"
			},
			dateformat: "required",
			terms: "required"
		},
		messages: {
			batch_code: {
				      required: "Enter Batch Code",
				      minlength: "Batch Code must be of 4 characters"
			},
			course_name: {
				      required: "Enter Course Name",
				      minlength: "Course Name must be atleast 2 characters"
			},
			start_time: {
				      required: "Enter Start Time",
				      min: "Must be greater than 0",
				      max: "Must be less than 12",
				      digit: "Must be a number"
			},
			end_time: {
				      required: "Enter End Time",
				      min: "Must be greater than 0",
				      max: "Must be less than 12",
				      digit: "Must be a number"
			},
			batch_strength: {
				          required: "Enter Batch Strength",
					  digit: "Must be a number"
			},
			username: {
				required: "Enter a username",
				minlength: jQuery.format("Enter at least {0} characters"),
				remote: jQuery.format("{0} is already in use")
			},
			password: {
				required: "Provide a password",
				rangelength: jQuery.format("Enter at least {0} characters")
			},
			password_confirm: {
				required: "Repeat your password",
				minlength: jQuery.format("Enter at least {0} characters"),
				equalTo: "Enter the same password as above"
			},
			email: {
				required: "Please enter a valid email address",
				minlength: "Please enter a valid email address",
				remote: jQuery.format("{0} is already in use")
			},
			dateformat: "Choose your preferred dateformat",
			terms: " "
		},
		// the errorPlacement has to take the table layout into account
		errorPlacement: function(error, element) {
			if ( element.is(":radio") )
				error.appendTo( element.parent().next().next() );
			else if ( element.is(":checkbox") )
				error.appendTo ( element.next() );
			else
				error.appendTo( element.parent().next() );
		},
		// specifying a submitHandler prevents the default submit, good for the demo
		submitHandler: function() {
			document.forms["signupform"].submit();

		},
		// set this class to error-labels to indicate valid fields
		success: function(label) {
			// set &nbsp; as text for IE
			label.html("&nbsp;").addClass("checked");
		}
	});
	
	// propose username by combining first- and lastname
	$("#username").focus(function() {
		var firstname = $("#firstname").val();
		if(firstname && !this.value) {
			this.value = firstname;
		}
	});

});
</script>
</head>

<body>
<h1>Create A New Batch</h1>
<div id="main">

<div id="content">

<div id="header">
</div>
<div style="clear: both;"><div></div></div>


<div class="content">
    <div id="signupbox">
       <div id="signuptab">
        <ul>
          <li id="signupcurrent"><a href=" ">Create New Batch</a></li>
        </ul>
      </div>
      <div id="signupwrap">
      		<form id="signupform" autocomplete="off" method="post" action="add_batch_p.php">
	  		  <table>
	  		  <tr>
	  		  	<td class="label"><label for="batch_code">Batch Code</label></td>
	  		  	<td class="field"><input id="batch_code" name="batch_code" type="text" value="" maxlength="4" /></td>
	  		  	<td class="status"></td>
	  		  </tr>
	  		  <tr>
	  			<td class="label"><label for="course_name">Course Name</label></td>
	  			<td class="field">
					<?php
                                             function create_dropdown($identifier,$pairs)
						{
						   $dropdown="<select name=\"$identifier\"> ";
						     
						     foreach($pairs AS $value => $name)
						     {
							$dropdown.="<option>$name</option>";
						     }
						     
						     //echo "</select>";
						   return $dropdown;
						}
						include "dbinst.php";
						$query="SELECT ID,NAME FROM courses ORDER BY NAME";
						$results=mysql_query($query);
						while($row = mysql_fetch_array($results))
						{
						$value = $row["ID"];
						$name = $row["NAME"];
						$pairs["$value"] = $name;
						}
						echo create_dropdown("course_name",$pairs);
						mysql_close();
						?>   
				</td>
	  			<td class="status"></td>
	  		  </tr>
	  		  <tr>
	  			<td class="label"><label for="start_time">Start Time</label></td>
	  			<td class="field"><input type="text" name="start_time" id="start_time" value=""/>
				<input type="radio" name="time1" value="am" checked="checked"/>am
				<input type="radio" name="time1" value="pm"/>pm
				</td>
	  			<td class="status"></td>
	  		  </tr>
	  		  <tr>
	  			<td class="label"><label for="end_time">End Time</label></td>
	  			<td class="field"><input type="text" name="end_time" id="end_time" value=""/>
				<input type="radio" name="time2" value="am" checked="checked"/>am
				<input type="radio" name="time2" value="pm"/>pm
				</td>
	  			<td class="status"></td>
	  		  </tr>
	  		  <tr>
	  			<td class="label"><label for="batch_strength">Batch Strength</label></td>
	  			<td class="field"><input id="batch_strength" name="batch_strength" type="text" maxlength="3" value="" /></td>
	  			<td class="status"></td>
	  		  </tr>
	  		
	  		  <tr>
	  			<td class="label"><label id="lsignupsubmit" for="signupsubmit">Create</label></td>
	  			<td class="field" colspan="2">
	            <input id="signupsubmit" name="signup" type="submit" value="Create" />
	  			</td>
	  		  </tr>

	  		  </table>
          </form>
      </div>
    </div>
</div>

</div>

</div>
</body>
</html>
