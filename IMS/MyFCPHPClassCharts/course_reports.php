<?php
  include "dbinst.php";
  # Include FusionCharts PHP Class
  include('Class/FusionCharts_Gen.php');

  # Create Column3D chart Object 
  $FC = new FusionCharts("MSColumn3D","600","500"); 
  # set the relative path of the swf file
  $FC->setSWFPath("FusionCharts/");

  # Set chart attributes
  $strParam="caption=Course Report;subcaption=Admissions vs. Enquiries;xAxisName=Course;yAxisName=No. of Students;numberPrefix=;decimalPrecision=0";
  $FC->setChartParams($strParam);

  # Add category names
  $query="SELECT NAME FROM courses";
  $results=mysql_query($query);
  while(list($name)=mysql_fetch_row($results))
  {
    $FC->addCategory($name);
  }
  
   # Create a new dataset 
   $FC->addDataset("Admissions");
   
   # Add chart values for the above dataset
  $query="SELECT STUDENTS FROM courses";
  $results=mysql_query($query);
  while(list($students)=mysql_fetch_row($results))
  {
    $FC->addChartData($students);
  }
  
  # Create second dataset
  $FC->addDataset("Enquiries");
  
  # Add chart values for the second dataset
  $query="SELECT ENQUIRIES FROM courses";
  $results=mysql_query($query);
  while(list($enquiries)=mysql_fetch_row($results))
  {
  $FC->addChartData($enquiries);
  }
?>
<html>
<head>
	<title>Course Report | Lead India Technologies</title>
	<script language='javascript' src='FusionCharts/FusionCharts.js'></script>
</head>

<body>

<?php
      # Render Chart
      $FC->renderChart();
    ?>

</body>
</html>
