<?php
	ini_set('display_errors', 1);
  	ini_set('display_startup_errors', 1);
  	error_reporting(E_ALL);	
	include("../../phpinc/includes/connexionDB.php");

	$request = 'INSERT INTO cat_activite (num, titre, img) VALUES (NULL, "'. $_POST['catName'] .'", "images/activites/default.jpg")';

	echo $request;

	$db->query($request);
	
?>
