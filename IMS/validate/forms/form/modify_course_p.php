!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Modify Course</title>

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
			course_name:{
				     required: true,
				     minlength: 2
			},
			course_code:{
				     required: true,
				     minlength: 2
			},
			course_contents:{
				     required: true,
			},
			course_duration:{
				     required: true,
				     number: true,
			},
			course_fees:{
				     required: true,
				     number: true,
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
			course_name: {
				      required: "Enter Course Name",
				      minlength: "Course Name must be atleast 2 characters",
			},
			course_code: {
				      required: "Enter Course Code",
				      minlength: "Course Code must be of 2 characters",
			},
			course_contents: {
				      required: "Enter Course Contents",
			},
			course_duration: {
				      required: "Enter Course Duration",
				      number: "Course Duration must be a number",
			},
			course_fees: {
				      required: "Enter Course Fees",
				      number: "Course Fees must be a number",
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

<?php
include "dbinst.php";
$name=$_POST['course_name'];

$query="SELECT ID,DURATION,FEES,CONTENTS FROM courses WHERE NAME='$name'";
$results=mysql_query($query);
list($id,$duration,$fees,$contents)=mysql_fetch_row($results);
?>

<h1>Modify Course</h1>
<div id="main">

<div id="content">

<div id="header">
</div>
<div style="clear: both;"><div></div></div>


<div class="content">
    <div id="signupbox">
       <div id="signuptab">
        <ul>
          <li id="signupcurrent"><a href=" ">Create New Course</a></li>
        </ul>
      </div>
      <div id="signupwrap">
      		<form id="signupform" autocomplete="off" method="post" action="add_course_p.php">
	  		  <table>
	  		  <tr>
	  		  	<td class="label"><label for="course_name">Course Name</label></td>
	  		  	<td class="field"><input id="course_name" name="course_name" type="text" value="" maxlength="50" /></td>
	  		  	<td class="status"></td>
	  		  </tr>
	  		  <tr>
	  			<td class="label"><label for="course_code">Course Code</label></td>
	  			<td class="field"><input id="course_code" name="course_code" type="text" value="" maxlength="2" /></td>
	  			<td class="status"></td>
	  		  </tr>
	  		  <tr>
	  			<td class="label"><label for="course_contents">Course Contents</label></td>
	  			<td class="field"><textarea name="course_contents" id="course_contents"></textarea></td>
	  			<td class="status"></td>
	  		  </tr>
	  		  <tr>
	  			<td class="label"><label for="course_duration">Course Duration</label></td>
	  			<td class="field"><input id="course_duration" name="course_duration" type="text" maxlength="3" value="" /> months</td>
	  			<td class="status"></td>
	  		  </tr>
	  		  <tr>
	  			<td class="label"><label for="course_fees">Course Fees</label></td>
	  			<td class="field"><input id="course_fees" name="course_fees" type="text" maxlength="6" value="" /> Rs</td>
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
$query="UPDATE courses SET NAME='$name',ID='$id',DURATION='$duration',FEES='$fees',CONTENTS='$contents' WHERE ID='$id'";
$results=mysql_query($query);

if($results)
{
	echo "Course Updated Successfully";
}
else
 echo "Error In Updating Course, Please Try Again";
mysql_close();
?>

</body>
</html>
