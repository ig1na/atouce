<?php include("../phpinc/includes/connexionDB.php"); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/static-menu.css">
  <link rel="stylesheet" href="css/main-content-activites.css">
  <link href="https://fonts.googleapis.com/css?family=Titillium+Web|Patua+One|Lato|Palanquin+Dark|Open+Sans" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Les activités</title>
</head>
<body>
  <header class="header-wrapper">
    <h1 class="header-text">atou'ce</h1>

    <div class="logo-wrapper">
      <img src="images/atouce.png" alt="logo atouce"/>
    </div>
  </header>

  <nav class="menu">
    <input type="checkbox" id="menu">
    <label for="menu" onclick></label>
    <ul>
      <li><a href="/accueil.php"><p>Accueil</p></a></li>
      <li><a href="/activites.php"><p>Activités</p></a></li>
      <li><a href="/elus.php"><p>Votre CE</p></a></li>
      <li><a href="#"><p>Les budgets</p></a></li>
      <li><a href="#"><p>L'agenda du CE</p></a></li>
      <li><a href="admin/"><p>Admin</p></a></li>
    </ul>
  </nav>

  <div class="main">
    <div class="cat-activites">
      <div class="cat-act-titre">
        <h1>Les activités <span class="light-text">du CE</span></h1>
        <h2>Sélectionnez l'activité que vous souhaitez visualiser</h2>
      </div>

      <div class="cat-img-wrapper">
        <?php
        $requete = 'SELECT * FROM cat_activites';
        foreach ($db->query($requete) as $row) {

          echo "<div class='cat-img'><div class='cat-img-link'><a href='#'></a><img src='images/paris.jpg'></div></div>";
        }
        ?>

      </div>
    </div>
  </div>

  <script>
  function isTextNode(noeud){
    return noeud.nodeType == 3;

  }

  function asHTML(noeud) {
    if(isTextNode(noeud))
      return escapeHTML(noeud.nodeValue);
    else if (noeud.childNodes.length == 0)
      return "<" + noeud.nodeName + "/>";
    else
      return "<" + noeud.nodeName + ">" +
      noeud.childNodes.map(asHTML).join("") +
      "</" + noeud.nodeName + ">";
  }
  </script>
</body>
</html>
