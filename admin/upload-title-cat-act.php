<?php
	ini_set('display_errors', 1);
  	ini_set('display_startup_errors', 1);
  	error_reporting(E_ALL);	
	include("../../phpinc/includes/connexionDB.php");

	$request = 'UPDATE cat_activite SET titre = "'. $_POST['title'] .'" WHERE num = "'. $_POST['num'] .'"';

	$db->query($request);
?>