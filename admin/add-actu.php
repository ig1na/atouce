<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	include("../../phpinc/includes/connexionDB.php");

	$add_actu = "INSERT INTO news (num, priority, titre, texte_desc, img, texte) VALUES (NULL, '0', 'En création..', 'Texte en cours de rédaction..', '', 'Actualité en cours de rédaction')";

	echo $add_actu;

	$db->query($add_actu);
?>