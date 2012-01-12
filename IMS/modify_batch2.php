<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<title>Modify Batch | Lead India Technologies</title>
</head>

<body>

<h3>Modify Batch</h3>
<form action="validate/demo/milk/modify_batch_o.php" method="post">
	<fieldset>
		<legend>Select Batch</legend>
<?php
function create_dropdown($identifier,&$name,$count,$first)
{
   $dropdown="<select name=\"$identifier\"> ";
    $dropdown.="<option>$first</option>";
     $count2=0;
     for($i=0;$i<$count;$i++)
     {
	echo "It is $name['0']";
        $dropdown.="<option>$name</option>";
	$count2++;
     }
     
     //echo "</select>";
   return $dropdown;
}
include "dbinst.php";
$count=0;
$query="SELECT ID FROM batches ORDER BY ID";
$results=mysql_query($query);
while(list($row) = mysql_fetch_row($results))
{
$name['$count'] = $row;
$count++;
}
echo create_dropdown("batch_name",$name,$count,"Select Batch");
mysql_close();
?>
<br/>
<input type="submit" name="submit" value="Modify">
	</fieldset>
	</form>

</body>
</html>
