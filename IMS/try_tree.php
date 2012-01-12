<?php
include "dbinst.php";
function checkParents($treeview_cod,$treeview_current,$treeview_parents)
    {
        $sql="select * from TAB_TREEVIEW where treeview_cod=".$treeview_cod." order
by
treeview_name";
        $rs=mysql_query($sql);
        if (mysql_num_rows($rs)!=0)
        {
            while($rows=mysql_fetch_array($rs))
            {
                  $treeview_parents[]=$rows["treeview_cod"];
                  checkParents($rows
["treeview_parent_cod"],$treeview_current,&$treeview_parents);
            }

        }

    }

//Function used to check if the folder that`s being opened
//is son of the one being displayed.

    function openFolder($treeview_cod,$treeview_current)
    {
        checkParents($treeview_cod,$treeview_current,&$treeview_parents);

        if (in_array($treeview_current,$treeview_parents))
        {
            return true;
        }
    }
   
//This was the most difficult of all the functions cause it
//calculates and organize the hierarchy of the opened folders...
//A pain in the ass, literally. I had night mares and woke up
//in the middle of the night because of this son of a b*

    function drawBlanksIntersecs($treeview_cod)
    {
            $sql="select * from TAB_TREEVIEW where treeview_cod=".$treeview_cod;
            $rs=mysql_query($sql);
            $row=mysql_fetch_array($rs);

            $sql2="select * from TAB_TREEVIEW where treeview_cod=".$row
["treeview_parent_cod"];
            $rs2=mysql_query($sql2);
            $row2=mysql_fetch_array($rs2);
           
            $sql3="select * from TAB_TREEVIEW where treeview_parent_cod=".$row2
["treeview_parent_cod"]." order by treeview_name";
            $rs3=mysql_query($sql3);

            $i=0;
           
            if (mysql_num_rows($rs3)!=0)
            {
                  while ($row3=mysql_fetch_array($rs3))
                  {

                      $i++;

                      if ($row3["treeview_cod"]==$row["treeview_parent_cod"] &&
mysql_num_rows
($rs3)==$i)
                      {
                           $is_last=1;
                      }
                      else
                      {
                           $is_last=0;
                      }
                  }
            }

            if ($row["treeview_parent_cod"]!=-1)
            {
                  drawBlanksIntersecs($row["treeview_parent_cod"]);
                 
                  if ($is_last==1)
                  {
                      echo "<img src=images/trv_blank.gif height=18 width=18
border=0 vspace=0
hspace=0 align=left>";
                  }
                  else
                  {
                      echo "<img src=images/trv_nointersec.gif height=18 width=18
border=0
vspace=0 hspace=0 align=left>";
                  }
            }

    }

//Function that builds the tree from root to the last opened folder
//I`m very proud of it, `cause it works!!! Don`t care if it is too
//messy or has too many ifs. At least idention is right, so if you
//want go ahead and fix it yourself.

    function buildTreeView($action,$treeview_cod=0,$treeview_parent_cod=-1)
    {

        $sql="select * from TAB_TREEVIEW where
treeview_parent_cod=".$treeview_parent_cod." order by treeview_name";
        $rs=mysql_query($sql);
        if (mysql_num_rows($rs)!=0)
        {
            $i=1;
            while ($parent=mysql_fetch_array($rs))
            {
                    echo "<tr valign=top>";
                    echo "<td nowrap>";

                    drawBlanksIntersecs($parent["treeview_cod"]);

                    $sql2="select * from TAB_TREEVIEW where
treeview_parent_cod=".$parent
["treeview_cod"]." order by treeview_name";
                    $rs2=mysql_query($sql2);
                    if (mysql_num_rows($rs2)!=0)
                    {
                         if ($action=="expand"&&openFolder($treeview_cod,$parent
["treeview_cod"]))
                         {
                               echo "<a href=treeview.php?
action=expand&treeview_cod=".$parent
["treeview_parent_cod"].">";

                               if (mysql_num_rows($rs)==$i)
                               {
                                   echo "<img
src=".$dir."images/trv_intersecminus_end.gif height=18
width=18 border=0 vspace=0 hspace=0 align=left>";
                               }
                               else
                               {
                                   echo "<img
src=".$dir."images/trv_intersecminus.gif height=18
width=18 border=0 vspace=0 hspace=0 align=left>";
                               }
                         }
                         else
                         {
                               echo "<a href=treeview.php?
action=expand&treeview_cod=".$parent
["treeview_cod"].">";

                               if (mysql_num_rows($rs)==$i)
                               {
                                   echo "<img
src=".$dir."images/trv_intersecplus_end.gif height=18
width=18 border=0 vspace=0 hspace=0 align=left>";
                               }
                               else
                               {
                                   echo "<img
src=".$dir."images/trv_intersecplus.gif height=18 width=18
border=0 vspace=0 hspace=0 align=left>";
                               }
                         }
                    }
                    else
                    {
                         if (mysql_num_rows($rs)==$i)
                         {
                               echo "<img src=images/trv_end.gif height=18 width=18
border=0
vspace=0 hspace=0 align=left>";
                         }
                         else
                         {
                               echo "<img src=images/trv_intersec.gif height=18
width=18 border=0
vspace=0 hspace=0 align=left>";
                         }
                    }

                    if ($action=="expand"&&openFolder($treeview_cod,$parent
["treeview_cod"]))
                    {
                         echo "<img src=images/trv_openfolder.gif height=18 width=18
border=0
vspace=0 hspace=0 align=left>";
                    }
                    else
                    {
                         echo "<img src=images/trv_closedfolder.gif height=18
width=18 border=0
vspace=0 hspace=0 align=left>";
                    }
                    echo "</a>";

                    //Here you can change where the link of the folder points too.
                    //You really should to edit it...

                    echo "<a href=main.php?treeview_cod=".$parent["treeview_cod"]."
target=treeview_main>";
                    echo "  ".$parent["treeview_name"];
                    echo "</td>";
                    echo "</tr>";
                    if ($action=="expand"&&openFolder($treeview_cod,$parent
["treeview_cod"]))
                    {
                         buildTreeView($action,$treeview_cod,$parent
["treeview_cod"]);
                    }

                    $i++;
            }
        }
    }

    echo "

    <html>
    <title>TreeView</title>
    <style>

        a {
                color:#000000;
                font-family:'Tahoma,Arial,Helvetica';
                font-size: 8pt;
                text-decoration:none;
        }

        a:hover {
                color:#0000FF;
                font-family:'Tahoma,Arial,Helvetica';
                font-size: 8pt;
                text-decoration:none;
        }

        .titulo {
                color:#000000;
                font-family:'Tahoma,Arial,Helvetica';
                font-size: 30pt;
                text-decoration:none;
                font-weight:bold;
        }

        p {
                color:#000000;
                font-family:'Tahoma,Arial,Helvetica';
                font-size: 11px;
                text-decoration:none;
        }

        text {
                color:#000000;
                font-family:'Tahoma,Arial,Helvetica';
                font-size: 11px;
                text-decoration:none;
        }

        </style>

        <body bgcolor=#FFFFFF>";

//Building the table for display of the treeview

    echo "<table border=0 cellpadding=0 cellspacing=0 width=100%>";

    echo "<tr>";
    echo "<td valign=top>";
    echo "<p><img src=images/trv_root.gif>";
    echo "  <font size=4><b>Root</b></font>";
    echo "</td>";
    echo "</tr>";

    echo "<tr height=3>";
    echo "<td valign=top nowrap>";
    echo "</td>";
    echo "</tr>";

//Calling the function for the treeview.

    buildTreeView($action,$treeview_cod);
   
//Closing everything...

    echo "</table>";
    echo "</body></html>"

?>