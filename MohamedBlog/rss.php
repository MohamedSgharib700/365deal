<?php
/*
* Author : Ali Aboussebaba
* Email : bewebdeveloper@gmail.com
* Website : http://www.bewebdeveloper.com
* Subject : How to Create an RSS Feed with PHP and MySQL
*/

// PDO connect *********
$ch = curl_init("http://elsewedy.careerec.com/");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, 0);
$data = curl_exec($ch);


$doc= new SimpleXMLElement($data,LIBXML_NOCDATA);
curl_close($ch);

echo "$data";
/*function RSS ($xml)
{
	echo "<strong>".$xml->channel->title."</strong><br>";
	$items = count($xml->channel->item);

	for($i=0;$i<$items;$i++){

		$url= $xml->channel->item[$i]->link;
		$title= $xml->channel->item[$i]->title;

		echo $data;
	}
} 
echo $data;

RSS($doc);*/

?>