<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<title>View/Make Payments</title>
	<style type="text/css" title="currentStyle">
			@import "media/css/demo_page.css";
			@import "media/css/demo_table.css";
			@import "examples_support/themes/smoothness/jquery-ui-1.7.2.custom.css";

	</style>

	<script type="text/javascript" language="javascript" src="media/js/jquery.js"></script>
	<script type="text/javascript" language="javascript" src="media/js/jquery.dataTables.js"></script>
		<script type="text/javascript" charset="utf-8">
			var oTable;
			
			$(document).ready(function() {	
				oTable = $('#example').dataTable();
			} );
		</script>
	</head>
	<body id="dt_example">
		<?php
		include "dbinst.php";
		if (isset($_POST['submit']))
		{
			//echo "Entered isset";
			foreach($_POST['payto'] AS $trans)
			{
				//echo "Entered foreach";
				$paytime=time();
				$query="UPDATE payments SET STATUS='DONE',PAYTIME='$paytime' WHERE TRANSID='$trans'";
				$results=mysql_query($query);
				if($results)
				{
					$query="SELECT STUDID,AMOUNT,PAYTIME,REMARKS FROM payments WHERE TRANSID='$trans'";
					$results3=mysql_query($query);
					$transstr=str_pad($trans,8,"0",STR_PAD_LEFT);
					$remarks=ereg_replace(" ", "%20",$remarks);
					list($studid1,$amount1,$ptime1,$remarks)=mysql_fetch_row($results3);
					$query="SELECT TOTPOINTS,NAME,FNAME,MOBILE FROM students WHERE ID='$studid1'";
					$results3=mysql_query($query);
					list($totpoints,$name,$fname,$mobile)=mysql_fetch_row($results3);
					$totpoints=$totpoints+($amount/5);
					$query="UPDATE students SET TOTPOINTS='$totpoints' WHERE ID='$studid1'";
					$results3=mysql_query($query);
					echo "<b>Payed Rs $amount1 to $name ($studid1) via Transaction Id $transstr successfully";
					$url = "http://smscgateway.com/messageapi.asp?username=sunnycomputers&password=tamanna&sender=SUNNYCOM&mobile=".$mobile."&message=Dear%20".$fname.",Congratulations!%20You%20have%20been%20paid%20Rs%20".$amount1."%20via%20Trans.%20ID%20".$transstr."%20Remarks:%20".$remarks."%20";
   		
					// create a new cURL resource
					$curl = curl_init();
			
					// set URL and other appropriate options
					curl_setopt($curl, CURLOPT_URL, $url);
					curl_setopt($curl, CURLOPT_RETURNTRANSFER, false);
					curl_setopt($curl, CURLOPT_HEADER, false);
			
					
					// grab URL and pass it to the browser
			
					curl_exec($curl);
			
					if (curl_errno($curl)) {
					print curl_error($curl);
					} else {
					curl_close($curl);
					}
			
					// close cURL resource, and free up system resources
					//curl_close($ch);
				}
				else
				{
					echo "Error in Paying, Kindly refresh or try again";
				}
			}
		}
		?>
		<div id="container">
			<div class="full_width big">
				<i>View or Make</i> payments
			</div>	
			
			<h1>The following payments are pending</h1>

			<div id="demo">
				<form action="view_make_payments.php" method="post">
					
<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
	<thead>
		<tr>
			<th>Student Name</th>
			<th>Student Id</th>
			<th>Amount</th>
			<th>Add Time</th>
			<th>SBI Account</th>
			<th>Branch</th>
			<th>Remarks</th>
			<th>Pay</th>
		</tr>

	</thead>
	<tbody>
		<?php
		include "dbinst.php";
		$query="SELECT TRANSID,STUDID,AMOUNT,ADDTIME,REMARKS FROM payments WHERE STATUS='PENDING'";
		$results=mysql_query($query);
		while(list($transid,$studid,$amount,$addtime,$remarks)=mysql_fetch_row($results))
		{
			$query="SELECT PAYELIG,SBI,BRANCH,NAME FROM students WHERE ID='$studid'";
			$results2=mysql_query($query);
			list($payelig,$sbi,$branch,$name)=mysql_fetch_row($results2);
			if($payelig)
			{
				$addtime=date("d-m-Y, g:i a", $addtime);
				$transstr=str_pad($transid,8,"0",STR_PAD_LEFT);
				echo "<tr>";
					echo "<td>$name</td>";
					echo "<td>$studid</td>";
					echo "<td>$amount</td>";
					echo "<td>$addtime</td>";
					echo "<td>$sbi</td>";
					echo "<td>$branch</td>";
					echo "<td>$remarks</td>";
					echo "<td class='center'><input type='checkbox' name='payto[]' value='$transid'/></td>";
				echo "</tr>";
					
				     
			}
		}
		?>
	
	</tbody>
	<tfoot>

		<tr>
			<th>Student Name</th>
			<th>Student Id</th>
			<th>Amount</th>
			<th>Add Time</th>
			<th>SBI Account</th>
			<th>Branch</th>
			<th>Remarks</th>
			<th>Pay</th>
		</tr>
	</tfoot>
</table>
<input type="submit" value="Pay!" name="submit"/>
				</form>
			</div>
			<div class="spacer"></div>
			
			
</div>
	
		
	</body>
</html>