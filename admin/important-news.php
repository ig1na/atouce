<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	include("../../phpinc/includes/connexionDB.php");

	$important_news = "UPDATE news SET news.priority = '". $_POST['priority'] ."' WHERE news.num = '" .$_POST['num'] ."'";

	echo $important_news;

	$db->query($important_news);
?>