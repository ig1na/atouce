<?php 
ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);	
	include("../../phpinc/includes/connexionDB.php");

		$request = 'UPDATE colonnes_accueil SET titre = "'. $_POST["title"] .'", contenu = "'. $_POST["text"] .'" WHERE colonnes_accueil.num = "' .$_POST["id"] .'" AND colonnes_accueil.zone = "'. $_POST["zone"] .'"';

		echo $request;

		$db->query($request);
 ?>