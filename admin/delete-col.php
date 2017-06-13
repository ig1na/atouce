<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("../../phpinc/includes/connexionDB.php");

if(!empty($_POST["num"]) && !empty($_POST["zone"])){
	$request = "DELETE FROM colonnes_accueil WHERE colonnes_accueil.num = '". $_POST['num'] ."' AND colonnes_accueil.zone = '". $_POST['zone'] ."'";
	echo $request; 

	$db->query($request);
}