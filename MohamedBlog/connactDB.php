<?php

include_once("DB.class.php");
include_once("Utility.php");

$query = "select * from posts order by subject_id desc";
	 $result = mysql_query($query);

$data = '<?xml version="1.0" encoding="UTF-8" ?>';
$data .= '<rss version="2.0">';
$data .= '<channel>';
$data .= '<title>Bewebdeveloper : Free web tutorials</title>';
$data .= '<link>http://elsewedy.careerec.com/</link>';
$data .= '<description>Free Web tutorials with source code, PHP Tutorials, JavaScript Tutorials, HTML Tutorials and CSS Tutorials</description>';



?>