<?php

  # Include FusionCharts PHP Class
  include('Class/FusionCharts_Gen.php');

  # Create Column3D chart Object 
  $FC = new FusionCharts("Column3D","800","500"); 
  # set the relative path of the swf file
  $FC->setSWFPath("FusionCharts/");

  # Set chart attributes
  $strParam="caption=Weekly Sales;xAxisName=Week;yAxisName=Revenue;numberPrefix=$;decimalPrecision=0;formatNumberScale=1";
  $FC->setChartParams($strParam);

  # add chart values and category names
  $FC->addChartData("40800","name=Week 1");
  $FC->addChartData("31400","name=Week 2");
  $FC->addChartData("26700","name=Week 3");
  $FC->addChartData("54400","name=Week 4");

?>
<html>
  <head>
    <title>First Chart Using FusionCharts PHP Class</title>
    <script language='javascript' src='FusionCharts/FusionCharts.js'></script>
  </head>
  <body>

  <?php
    # Render Chart 
    $FC->renderChart();
  ?>

  </body>
</html>

