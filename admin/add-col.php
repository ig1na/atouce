<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("../../phpinc/includes/connexionDB.php");

if(!empty($_POST['zone'])){
  $request = "INSERT INTO colonnes_accueil (num, titre, contenu, img, link, zone) VALUES (NULL, '', '', '', '', '". $_POST["zone"] ."')";

  $db->query($request);
}

 ?>
