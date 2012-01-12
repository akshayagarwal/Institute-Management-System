<?php

//error_reporting(E_ERROR);

include "dbinst.php";

$tab_status = mysql_query("SHOW TABLE STATUS");

while($all = mysql_fetch_assoc($tab_status)):
    $tbl_stat[$all['Name']] = $all['Auto_increment'];
endwhile;

$backup="";

unset($backup);

$tables = mysql_list_tables("simplyth_institute");

while($tabs = mysql_fetch_row($tables)):
    //echo "In Upper While";
    //$backup .= "--\n--Table structure for `$tabs[0]`\n--\n\nDROP IF EXISTS TABLE `$tabs[0]`\nCREATE TABLE IF NOT EXISTS `$tabs[0]` (";
    $backup .= "CREATE TABLE IF NOT EXISTS `$tabs[0]` (";
    $res = mysql_query("SHOW CREATE TABLE $tabs[0]");
    while($all = mysql_fetch_assoc($res)):
        $str = str_replace("CREATE TABLE `$tabs[0]` (", "", $all['Create Table']);
        $str = str_replace(",", ",", $str);
        $str2 = str_replace("`) ) TYPE=MyISAM ", "`)\n ) TYPE=MyISAM ", $str);
        /*if(isset($tbl_stat[$tabs[0]]))
        {
        $backup .= $str2." AUTO_INCREMENT=".$tbl_stat[$tabs[0]].";\n\n";
        }
        else
        {
            $backup .= $str2.";\n\n";
        }*/
        $backup .= $str2.";\n\n";
    endwhile;
    
    //$backup .= "--\n--Data to be executed for table `$tabs[0]`\n--\n\n";

    $data = mysql_query("SELECT * FROM $tabs[0]");
    
    while($dt = mysql_fetch_row($data)):
        $backup .= "INSERT INTO `$tabs[0]` VALUES('$dt[0]'";
        for($i=1; $i<sizeof($dt); $i++):
            $backup .= ", '$dt[$i]'";
        endfor;
        $backup .= ");\n";
    endwhile;
    $backup .= "\n-- --------------------------------------------------------\n\n";
endwhile;

$fName = "YavalComputers_IMS_backup_".date("d-m-Y-H-i").".sql";
$fp = fopen($_SERVER['DOCUMENT_ROOT']."/$fName", "w");
fwrite($fp, $backup);
fwrite($fp,"\r\n");
fclose($fp);

//echo $backup;

// We'll be outputting a sql
header('Content-type: application/sql');

// It will be called $fName
header("Content-Disposition: attachment; filename=$fName");

// The PDF source is in original.pdf
readfile($_SERVER['DOCUMENT_ROOT']."/$fName");


?>

