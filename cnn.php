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


$url = 'http://rss.cnn.com/rss/edition_technology.rss';
$response = curl_get($url);
$xml = simplexml_load_string($response);
foreach ($xml->channel->item as $item) {
echo '<a href="'.$item->link.'" target="_blank">'.$item->title.'</a><br>';
}


?>