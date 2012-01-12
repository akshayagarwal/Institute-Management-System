<?php
 include "dbinst.php";
 $pid=$_GET['pid'];
 $query="SELECT CHILD1,CHILD2 FROM students WHERE ID='$pid'";
 $results=mysql_query($query);
 list($child1,$child2)=mysql_fetch_row($results);
 if($child1==NULL OR $child2==NULL)
 {
	return true;
 }
 else
 {
	return false;
 }
 //$row=mysql_fetch_row($results);
 ?>
