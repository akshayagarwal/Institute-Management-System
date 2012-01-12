 <html>

<head>
	<title>Student Tree | Lead India Technologies</title>
	<link rel="StyleSheet" href="dtree.css" type="text/css" />
	<script type="text/javascript" src="dtree.js"></script>
</head>

<body leftMargin='20'>
	<?php
		include "dbinst.php";
		$query="SELECT ID FROM students WHERE ID=PID";
		$results=mysql_query($query);
		list($id)=mysql_fetch_row($results);
		echo "Its $id";
		?>

<div class="dtree">
	
	<script type="text/javascript">
		<!--

		//id, pid, name, url, title, target, icon, iconOPne, open,

		d = new dTree('d');
		d.config.target="right";		
		d.config.folderLinks = false;
		
// ----------------- INTRODUCTION ------------------//
		d.add(0,-1,'<B>Student Tree</B>','','Registered Students At Sunny Computers');
		
		
		
		d.add(1,0,'akshay Agarwal','','','','','',true);
		
		d.add('DAMS00003',1,'Deepak O Rathod');
		d.add('SPMS00004','DAMS00003','Satish K Patil');
		d.add('PJMS00005','SPMS00004','Prakash R Jain');
		d.add('ADOR00001','DAMS00003','Aviraj V Deshpande');
		

					
		
		document.write(d);

		//-->
	</script>

	<p><a href="javascript: d.openAll();">Expand all</a> | <a href="javascript: d.closeAll();">Collapse all</a></p>
</div>
</body>

</html>