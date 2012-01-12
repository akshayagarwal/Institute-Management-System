<?php
 include "dbinst.php";

  # Include FusionCharts PHP Class
  include('Class/FusionCharts_Gen.php');

  # Create Column3D chart Object 
  $FC = new FusionCharts("Column3D","800","500"); 
  # set the relative path of the swf file
  $FC->setSWFPath("FusionCharts/");

  # Set chart attributes
  $strParam="caption=Enquiry Source Report;xAxisName=Enquiry Source;yAxisName=No. of Enquiries;numberPrefix=;decimalPrecision=0;formatNumberScale=1";
  $FC->setChartParams($strParam);

  # add chart values and category names
  $query="SELECT NAME,ENQUIRIES FROM eqsource";
  $results=mysql_query($query);
  
  while(list($name,$enquiries)=mysql_fetch_row($results))
  {
     $FC->addChartData("$enquiries","name=$name");
  }

?>
<html>
  <head>
    <title>Enquiry Source Report | Lead India Technologies</title>
    <script language='javascript' src='FusionCharts/FusionCharts.js'></script>
  </head>
  <body>

  <?php
    # Render Chart 
    $FC->renderChart();
  ?>

  </body>
</html>

