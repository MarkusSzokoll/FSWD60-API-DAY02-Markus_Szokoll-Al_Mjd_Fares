<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

</body>
</html>
<?php


/*

* Fetch the RSS feed

* that contains BBC’s technology news

*/

$url = 'http://feeds.bbci.co.uk/news/technology/rss.xml';
$xml = file_get_contents($url); //Reads entire file into a string
echo $xml;

?>