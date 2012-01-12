<?php
 
   include "dbinst.php";
  $mcode=$_POST['mcode'];
  $quantity2=$_POST['quantity2'];
  
  $query="SELECT QUANTITY,REMAIN FROM materials WHERE MCODE='$mcode'";
  $results=mysql_query($query);
  
  list($quantity,$remain)=mysql_fetch_row($results);
  
  $quantity=$quantity+$quantity2;
  $remain=$remain+$quantity2;
  
  $addtime=time();
  
  $query="UPDATE materials SET QUANTITY='$quantity',REMAIN='$remain',ADDTIME='$addtime' WHERE MCODE='$mcode'";
  $results=mysql_query($query);
  
  if($results)
  {
	echo "Updated Successsfully!";
  }
  
  else{
	echo "Error,Kindly Refresh or Try Again";
  }
  ?>