<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<title>Send SMS</title>
</head>

<body>

<?php
/*************DONT FORGET TO USE %20 FOR ALL SPACES IN THE SMS STRING*********************/
$mobile="9970103544";
$url = "http://smscgateway.com/messageapi.asp?username=sunnycomputers&password=tamanna&sender=SUNNYCOM&mobile=".$mobile."&message=Hello%20World";
   		
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

?>

</body>
</html>