<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("../../phpinc/includes/connexionDB.php");

if(!empty($_POST["num"])){
	$request = "DELETE FROM news WHERE news.num = '". $_POST['num'] ."'";
	echo $request; 

	$db->query($request);
}