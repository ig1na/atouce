<?php
	ini_set('display_errors', 1);
  	ini_set('display_startup_errors', 1);
  	error_reporting(E_ALL);	
	include("../../phpinc/includes/connexionDB.php");

	$request = 'INSERT INTO cat_activite (id, titre, img) VALUES (NULL, "Catégorie '. $_POST["numCats"] .'", "images/actDefault.jpg")';

	echo $request;

	$db->query($request);
	
?>
