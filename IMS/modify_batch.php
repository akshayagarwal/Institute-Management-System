<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<title>Modify Batch| Lead India Technologies</title>
</head>

<body>
<h3>Modify Batch</h3>
<form action="validate/demo/milk/modify_batch_o.php" method="post">
	<fieldset>
		<legend>Select Batch</legend>
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
$query="SELECT ID2,ID FROM batches ORDER BY ID";
$results=mysql_query($query);
while($row = mysql_fetch_array($results))
{
$value = $row["ID2"];
$name = $row["ID"];
$pairs["$value"] = $name;
}
echo create_dropdown("batch_code",$pairs,"Select Batch");
mysql_close();
?>
<br/>
<input type="submit" name="submit" value="Modify">
	</fieldset>
	</form>

</body>
</html>
