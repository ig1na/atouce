<?php 
	ini_set('display_errors', 1);
  	ini_set('display_startup_errors', 1);
  	error_reporting(E_ALL);	
	include("../../phpinc/includes/connexionDB.php");

	$request = 'UPDATE activite SET titre_act = "'. $_POST['title'] .'", date = "'. $_POST['date'] .'", texte = "'. $_POST['txt'] .'" WHERE num = "'. $_POST['num'] .'"';

	echo $request;

	$db->query($request);
 ?>