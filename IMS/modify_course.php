<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<title>Modify Course | Lead India Technologies</title>
</head>

<body>
<h3>Modify Course</h3>
<form action="validate/demo/milk/modify_course_o.php" method="post">
	<fieldset>
		<legend>Select Course</legend>
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
<br/>
<input type="submit" name="submit" value="Modify">
	</fieldset>
	</form>

</body>
</html>
