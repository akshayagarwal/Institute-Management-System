<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Pay Fees | Lead India Technologies</title>

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
			rno:{
				     required: true,
			},
			studid:{
				     required: true,
				     minlength: 9
			},
			sbi:{			
				     minlength: 11,
				     digits: true,
			},
			amount:{
				     required: true,
				     digits: true,
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
			dateformat: "required",
			terms: "required"
		},
		messages: {
			rno: {
				      required: "Enter Receipt Number",
			},
			studid: {
				      required: "Enter Student ID",
				      minlength: "Must be of 9 characters",
			},
			sbi: {
				      minlength: "Must be of 11 digits",
				      digits: "Must be in digits",
			},
			amount: {
				      required: "Enter Amount",
				      digits: "Must be in digits",
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
	
<h1>Add A New Student</h1>
<div id="main">

<div id="content">

<div id="header">
</div>
<div style="clear: both;"><div></div></div>


<div class="content">
    <div id="signupbox">
       <div id="signuptab">
        <ul>
          <li id="signupcurrent"><a href=" ">Pay Fees</a></li>
        </ul>
      </div>
      <div id="signupwrap">
      		<form  id="signupform" autocomplete="off" method="post" action="pay_fees_p.php">
	  		  <table>
	  		  <tr>
	  		  	<td class="label"><label for="rno">Receipt No.</label></td>
	  		  	<td class="field"><input id="rno" name="rno" type="text" value="" maxlength="15" title="Enter Recipt No. from Receipt Book"/></td>			
	  		  	<td class="status"></td>
	  		  </tr>
			  <tr>
	  			<td class="label"><label for="dop">Date</label></td>
	  			<td class="field"><select name="dopdd" id="dop">
					<option>DD</option>
					<option>01</option>
					<option>02</option>
					<option>03</option>
					<option>04</option>
					<option>05</option>
					<option>06</option>
					<option>07</option>
					<option>08</option>
					<option>09</option>
					<?php
                                           for($i=10;$i<=31;$i++)
					   echo "<option>$i</option>";
					?>
					</select>
				<select name="dopmm">
					<option>MM</option>
					<option>01</option>
					<option>02</option>
					<option>03</option>
					<option>04</option>
					<option>05</option>
					<option>06</option>
					<option>07</option>
					<option>08</option>
					<option>09</option>
					<option>10</option>
					<option>11</option>
					<option>12</option>
				</select>
				<select name="dopyyyy">
					<option>YYYY</option>
					<option>1990</option>
					<?php
					for($i=1991;$i<=2020;$i++)
					{
						echo "<option>$i</option>";
					}
					?>
				</select>
				</td>
	  			<td class="status"></td>
	  		  </tr>
	  		  <tr>
	  			<td class="label"><label for="studid">Student ID</label></td>
	  			<td class="field"><input type="text" id="studid" name="studid" maxlength="9" value=""/></td>
				<td class="field"><input type="button" name="search_pid" value="Search" onClick="window.open('../../../view_pending_fees.php','view_pending_fees.php')"/>
				<td class="status"></td>
			  </tr>
		
			  <tr>
				<td class="label"><label for="amount">Amount</label></td>
				<td class="field"><input type="text" id="amount" name="amount" value="" maxlength="7"/></td>
				<td class="status"></td>
			 </tr>
			 <tr>
	  			<td class="label"><label for="remarks">Remarks</label></td>
	  			<td class="field"><input type="text" id="remarks" name="remarks" value=""></td>
	  			<td class="status"></td>
	  		  </tr>
			 
	  		 <tr>
	  			<td class='label'><label id='lsignupsubmit' for='signupsubmit'>Pay</label></td>
	  			<td class='field' colspan='2'>
	                       <input id='signupsubmit' name='signup' type='submit' value='Pay' />
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