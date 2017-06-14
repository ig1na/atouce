<?php 
	ini_set('display_errors', 1);
  	ini_set('display_startup_errors', 1);
  	error_reporting(E_ALL);	
	include("../../phpinc/includes/connexionDB.php");

	$request = 'UPDATE news SET titre = "'. $_POST["title"] .'", texte = "'. $_POST["text"] .'", texte_desc = "'. $_POST["text_desc"] .'" WHERE news.num = "' .$_POST["num"] .'"';

	echo $request;

	$db->query($request);
 ?>