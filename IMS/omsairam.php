<html>

<head>
	<title>Student Tree | Lead India Technologies</title>
	<link rel="StyleSheet" href="dtree.css" type="text/css" />
	<script type="text/javascript" src="dtree.js"></script>
</head>
<body leftMargin='20'>
<div class="dtree">
	<?php
	include "dbinst.php";
		$query="SELECT ID,NAME FROM students WHERE ID=PID";
		$results=mysql_query($query);
		list($pid,$name2)=mysql_fetch_row($results);
	echo "<script type='text/javascript'>";
	
		

		//id, pid, name, url, title, target, icon, iconOPne, open,

		echo "d = new dTree('d');";
		echo "d.config.target='right';";		
		echo "d.config.folderLinks = false;";
		
// ----------------- INTRODUCTION ------------------//
		echo "d.add(0,-1,'<B>Student Tree</B>','','Registered Students At Sunny Computers');";
		
		
		
		echo "d.add('$pid',0,'$name2','','','','','');";
		
		$query="SELECT PID,ID,NAME FROM students WHERE PID!=ID";
		$results=mysql_query($query);
		while(list($pid,$id,$name)=mysql_fetch_row($results))
		{
		    
		    echo "d.add('$id','$pid','$name');";	
		}
		/*echo "d.add('DAMS00003','$id','Deepak O Rathod');";
		echo "d.add('SPMS00004','DAMS00003','Satish K Patil');";
		echo "d.add('PJMS00005','SPMS00004','Prakash R Jain');";
		echo "d.add('ADOR00001','DAMS00003','Aviraj V Deshpande');";
		*/

					
		
		echo "document.write(d);";

		//-->
	echo "</script>";
	?>

	<p><a href="javascript: d.openAll();">Expand all</a> | <a href="javascript: d.closeAll();">Collapse all</a></p>
</div>
</body>

</html>