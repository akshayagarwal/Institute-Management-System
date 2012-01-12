<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<title>Batch Report | Lead India Technologies</title>
</head>

<body>

<h2>Select a Course</h2>
<form action="batch_report_p.php" method="post">
<?php
include "dbinst.php";
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
$query="SELECT ID,NAME FROM courses ORDER BY ID";
$results=mysql_query($query);
while($row = mysql_fetch_array($results))
{
$value = $row["ID"];
$name = $row["NAME"];
$pairs["$value"] = $name;
}
echo create_dropdown("course",$pairs);
      
?>
<input type="submit" name="submit" value="Submit"/>
</form>

</body>
</html>
