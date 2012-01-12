<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>View/Modify Enquriy Details | Lead India Technologies</title>

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
			},
			id:{
				     required: true,
				     minlength: 9
			},
			sbi:{			
				     minlength: 11,
				     digits: true,
			},
			address1:{
				     required: true,
			},
			address2:{
				     required: true,
			},
			address3:{
				     required: true,
			},
			pincode:{
				     required: true,
				     digits: true,
				     minlength: 6
			},
			mobile:{
				     required: true,
				     minlength: 10,
				     digits: true,
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
			status: {
				required: true,
			},
			dateformat: "required",
			terms: "required"
		},
		messages: {
			course_name: {
				      required: "Enter Course Name",
			},
			id: {
				      required: "Enter Referred By ID",
				      minlength: "Must be of 9 characters",
			},
			sbi: {
				      minlength: "Must be of 11 digits",
				      digits: "Must be in digits",
			},
			address1: {
				      required: "Enter Address",
			},
			address2: {
				      required: "Enter Address",
			},
			address3: {
				      required: "Enter Address",
			},
			pincode: {
				      required: "Enter Pincode",
				      digits: "Must be in Digits",
				      minlength: "Must be of 6 digits"
			},
			mobile: {
				      required: "Enter Mobile No.",
				      minlength: "Must be of 10 digits",
				      digits: "Must be in Digits"
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
			status: {
				required: "Please enter student admitted or not"
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
	$id=$_POST['id'];
	echo "Student ID : $id";
	$query="SELECT COURSE,BATCH,FNAME,MNAME,LNAME,DOB,GENDER,ADDRESS1,ADDRESS2,ADDRESS3,PINCODE,MOBILE,LANDLINE,EMAIL,REMARKS,SOURCE,STATUS FROM enquiries WHERE ID='$id'";
	$results=mysql_query($query);
	list($course,$batch,$fname,$mname,$lname,$dob,$gender,$address1,$address2,$address3,$pincode,$mobile,$landline,$email,$remarks,$source,$status)=mysql_fetch_row($results);
	$n=mysql_num_rows($results);
	if($n<=0)
	{
	echo "<h3> Invalid Enquiry ID, Kindly Try Again </h3>";
	echo "<form action='view_modify_enquiry_p.php' method='post'>";
	echo "<label for='id'>Enquiry ID</label>";
	echo "<input type='text' name='id' label='id' maxlength='11'/>";
	echo "<input type='submit' name='submit' value='Submit'/>";
	echo "</form>";
	}
	$check1="";
	$check2="";
	if($status=="ENQUIRED")
	  $check2="checked=checked";
	else
	  $check1="checked=checked";
	?>
<h1>Enquiry Details</h1>
<div id="main">

<div id="content">

<div id="header">
</div>
<div style="clear: both;"><div></div></div>


<div class="content">
    <div id="signupbox">
       <div id="signuptab">
        <ul>
          <li id="signupcurrent"><a href=" ">Enquiry Details</a></li>
        </ul>
      </div>
      <div id="signupwrap">
      		<form id="signupform" autocomplete="off" method="post" action="view_modify_enquiry_pop.php">
			<input type="hidden" name="id" value="<?php echo $id;?>"
	  		  <table>
	  		  <tr>
	  		  	<td class="label"><label for="id">Enquiry ID</label></td>
	  		  	<td class="field"><?php echo $id;?></td>
	  		  	<td class="status"></td>
	  		  </tr>
			  <tr>
	  		  	<td class="label"><label for="id">Source</label></td>
	  		  	<td class="field"><?php echo $source;?></td>
	  		  	<td class="status"></td>
	  		  </tr>
	  		  <tr>
	  			<td class="label"><label for="course_name">Course</label></td>
	  			<td class="field"><?php echo $course;?></td>
	  			<td class="status"></td>
	  		  </tr>
	  		  <tr>
	  			<td class="label"><label for="stud_name">Student Name</label></td>
	  			<td class="field"><input type="text" name="fname" value="<?php echo $fname;?>" maxlength="15"/></td>
				<td class="field"><input type="text" name="mname" value="<?php echo $mname;?>" maxlength="15"/></td>
				<td class="field"><input type="text" name="sname" value="<?php echo $lname;?>" maxlength="15"/></td>
	  		  </tr>
	  		  <tr>
	  			<td class="label"><label for="dob">Date Of Birth</label></td>
	  			<td class="field"><?php echo $dob;?></td>
	  			<td class="status"></td>
	  		  </tr>
	  		  <tr>
	  			<td class="label"><label for="gender">Gender</label></td>
	  			<td class="field"><?php echo $gender;?></td>
	  			<td class="status"></td>
	  		  </tr>
	  		  <tr>
	  			<td class="label"><label for="address1">Address Line1</label></td>
	  			<td class="field"><input type="text" id="address1" name="address1" value="<?php echo $address1;?>"></td>
	  			<td class="status"></td>
	  		  </tr>
			  <tr>
	  			<td class="label"><label for="address2">Address Line2</label></td>
	  			<td class="field"><input type="text" id="address2" name="address2" value="<?php echo $address2;?>"></td>
	  			<td class="status"></td>
	  		  </tr>
			  <tr>
	  			<td class="label"><label for="address2">Address Line3</label></td>
	  			<td class="field"><input type="text" id="address3" name="address3" value="<?php echo $address3;?>"></td>
	  			<td class="status"></td>
	  		  </tr>
			  <tr>
	  			<td class="label"><label for="pincode">Pincode</label></td>
	  			<td class="field"><input type="text" id="pincode" name="pincode" maxlength="6" value="<?php echo $pincode;?>"></td>
	  			<td class="status"></td>
	  		  </tr>
			  <tr>
	  			<td class="label"><label for="mobile">Mobile No.</label></td>
	  			<td class="field"><input type="text" title="Enter Mobile No. without 0 or +91 prefix" id="mobile" name="mobile" maxlength="10" value="<?php echo $mobile;?>"></td>
	  			<td class="status"></td>
	  		  </tr>
			  <tr>
	  			<td class="label"><label for="landline">Landline No.</label></td>
	  			<td class="field"><input type="text" id="landline" name="landline" value="<?php echo $landline;?>"></td>
	  			<td class="status"></td>
	  		  </tr>
			  <tr>
	  			<td class="label"><label for="email">Email ID</label></td>
	  			<td class="field"><input type="text" id="email" name="email" value="<?php echo $email;?>"></td>
	  			<td class="status"></td>
	  		  </tr>
			  
			  <tr>
	  			<td class="label"><label for="status">Student Admitted</label></td>
				<td class="field"><input type="radio" name="status" value="Yes" <?php echo $check1;?>/>Yes
				<input type="radio" name="status" value="No" <?php echo $check2;?>/>No</td>
	  			<td class="status"></td>
	  		  </tr>
			  
			  <tr>
	  			<td class="label"><label for="remarks">Remarks</label></td>
	  			<td class="field"><input type="text" id="remarks" name="remarks" value="<?php echo $remarks;?>"></td>
	  			<td class="status"></td>
	  		  </tr>
	  		  

	  		  <tr>
	  			<td class="label"><label id="lsignupsubmit" for="signupsubmit">Submit</label></td>
	  			<td class="field" colspan="2">
	                        <input id="signupsubmit" name="signup" type="submit" value="Submit" />
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