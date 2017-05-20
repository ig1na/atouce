<?php
  include("../phpinc/includes/connexionDB.php");
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  //$requete = 'SELECT * FROM activite WHERE id = $_GET["id"] AND titre = $_GET["titre"]';
    $requete = 'SELECT * FROM activite WHERE id = '. $_GET["id"] .' AND titre_act = "'. $_GET["titre"] .'"';

  foreach ($db->query($requete) as $row) {
    echo "<img src='images/". $row['img'] ."'>";
    echo "<h1>". $row['titre_act'] ."</h2>";
    echo "<p>". $row['texte'] ."</p>";
  }
 ?>
