<?php
include "dbinst.php";
$matname=$_POST['material_name'];
$quantity=$_POST['quantity'];
$remarks=$_POST['remarks'];

//echo "Its $matname, $quantity, $remarks";

$query="SELECT COUNT(*) FROM materials";
$results=mysql_query($query);
list($mcode)=mysql_fetch_row($results);
$mcode=$mcode+1;
//echo "Its $mcode";
$atime=time();
//echo "Its $atime";
$query ="INSERT INTO materials SET MCODE='$mcode',MATNAME='$matname',QUANTITY='$quantity',REMAIN='$quantity',ADDTIME='$atime',REMARKS='$remarks'";
$results=mysql_query($query);
if($results)
{
	echo "<b>New Material Added Successfully!";
	echo "<br/>";
	echo "<b>Material Code : ".$mcode;
	echo "<br/>";
	echo "<b>Material Name : ".$matname;
	echo "<br/>";
	echo "<b>Quantity : ".$quantity;
}
else
{
	echo mysql_error();
	//echo "Error in adding new material, Kindly Refresh or try again";
}
?>