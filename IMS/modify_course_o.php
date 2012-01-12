<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<title>Modify Course | Lead India Technologies</title>
</head>

<body>
<form action="modify_course_p.php" method="post">
	<fieldset>
		<legend>Update Course Details</legend>
<?php
$name=$_POST['course_name'];
include "dbinst.php";
$query="SELECT * FROM courses WHERE NAME='$name'";
$results=mysql_query($query);
list($name,$id,$duration,$fees,$a1,$a2,$contents)=mysql_fetch_row($results);
?>

 <table>
			<tr>
				<td>
		                    <label for="course_name">Course Name</label>
				</td>
				<td>
					<input type="text" name="course_name" id="course_name" size="50" maxlength="50" value="<?php echo $name?>"/><br/>    
				</td>
			</tr>
			<tr>
			        <td>
				      <label for="course_code">Course Code</label>
				</td>
				<td>
					<input type="hidden" name="course_code" id="course_code" size="3" maxlength="2" value="<?php echo $id?>"/><?php echo $id?><br/>
				</td>
			</tr>
			<tr>
				<td>
				    <label for="course_contents">Contents</label>
				</td>
				<td>
				       <textarea name="course_contents" id="course_contents" rows="5" cols="40"><?php echo $contents?></textarea><br/>
				</td>
			</tr>
			<tr>
			        <td>
				      <label for="course_duration">Course Duration</label>
				</td>
				<td>
					<input type="text" name="course_duration" id="course_duration" size="5" maxlength="5" value="<?php echo $duration?>"> months<br/>
				</td>
			</tr>
			<tr>
				<td>
				    <label for="course_fees">Fees</label>
				</td>
				<td>
				       <input type="text" name="course_fees" id="course_fees" size="10" maxlength="10" value="<?php echo $fees?>"> Rs<br/>
				</td>
			</tr>
			<tr>
				<td align="right">
					<input type="submit" name="submit" value="Update">
				</td>
				<td>
					<input type="reset" name="reset" value="Reset">
				</td>
			</tr>
				
		</table>
		
	</fieldset>
</body>
</html>
