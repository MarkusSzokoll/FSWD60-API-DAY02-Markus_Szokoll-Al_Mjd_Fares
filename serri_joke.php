<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

</body>


<?php
function build_query_string(array $params) {
$query_string = http_build_query($params);
return $query_string;
}


function curl_get($url) {
$client = curl_init($url);
curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($client);
curl_close($client);
return $response;
}


$url = 'http://api.serri.codefactory.live/random/';
$response = curl_get($url);

$res = json_decode($response);
echo $res->joke;


?>
</html>