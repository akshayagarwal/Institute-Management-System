<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<title>Add New Batch | Lead India Technologies</title>
</head>

<body>
<h2>Add New Batch</h2>

<form action="add_batch_p.php" method="post">
	<fieldset>
		<legend>Batch Details</legend>
		<table>
			<tr>
				<td>
		                    <label for="batch_code">Batch Code</label>
				</td>
				<td>
					<input type="text" name="batch_code" id="batch_code" size="7" maxlength="7"/><br/>    
				</td>
			</tr>
			<tr>
				<td>
		                    <label for="course_name">Course</label>
				</td>
				<td>
					<?php
                                             function create_dropdown($identifier,$pairs,$first)
						{
						   $dropdown="<select name=\"$identifier\"> ";
						    $dropdown.="<option>$first</option>";
						     
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
						echo create_dropdown("course_name",$pairs,"Select Course");
						mysql_close();
						?>   
				</td>
			</tr>
			<tr>
				<td>
		                    <label for="start_time">Start Time</label>
				</td>
				<td>
					<input type="text" name="start_time" id="start_time" size="2" maxlength="2"/>
					<input type="radio" name="time1" value="am">am
					<input type="radio" name="time1" value="pm">pm<br/>    
				</td>
			</tr>
                        <tr>
				<td>
		                    <label for="end_time">End Time</label>
				</td>
				<td>
					<input type="text" name="end_time" id="end_time" size="2" maxlength="2"/>
					<input type="radio" name="time2" value="am">am
					<input type="radio" name="time2" value="pm">pm<br/>    
				</td>
			</tr>
			<tr>
				<td>
					<label for="batch_strength">Batch Strength</label>
				</td>
				<td>
					<input type="text" name="batch_strength" id="batch_strength" size="3" maxlength="3">
				</td>
			</tr>
			<tr>
				<td align="right">
					<input type="submit" name="submit" value="Submit">
				</td>
				<td>
					<input type="reset" name="reset" value="Reset">
				</td>
			</tr>
		</table>
	</fieldset>
</form>

</body>
</html>
