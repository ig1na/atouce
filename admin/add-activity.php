<?php
	ini_set('display_errors', 1);
  	ini_set('display_startup_errors', 1);
  	error_reporting(E_ALL);	
	include("../../phpinc/includes/connexionDB.php");

	$request = "INSERT INTO activite (num, titre_act, date, categorie, img, texte) VALUES (NULL, 'En cours de rédaction', '". $_POST['date'] ."', '". $_POST['cat'] ."', 'images/activites/default.jpg', 'En cours de rédaction')";

	echo $request;

	$db->query($request);
?>