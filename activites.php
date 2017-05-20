<?php include("../phpinc/includes/connexionDB.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>

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
  <div class="entire-body">
    <header class="header-wrapper">
      <h1 class="header-text">atou'ce</h1>

      <div class="logo-wrapper">
        <img src="images/atouce.png" alt="logo atouce"/>
      </div>
    </header>

    <nav class="menu">
      <!--<input type="checkbox" id="menu">-->
      <!--<label for="menu" onclick></label>-->

      <div class="menu-button">
        <a class="threelines-button" href="#menu">
        </a>
      </div>
      <ul>
        <li><a href="/accueil.php"><p>Accueil</p></a></li>
        <li><a href="/activites.php"><p>Activités</p></a></li>
        <li><a href="/elus.php"><p>Votre CE</p></a></li>
        <li><a href="#"><p>Les budgets</p></a></li>
        <li><a href="#"><p>L'agenda du CE</p></a></li>
        <li><a href="admin/"><p>Admin</p></a></li>
      </ul>
    </nav>

    <div class="entire-page">
      <div class="main">
        <div class="cat-activites">
          <div class="cat-act-titre">
            <h1>Les activités <span class="light-text">du CE</span></h1>
            <h2>Sélectionnez une catégorie d'activités</h2>
          </div>

          <div class="cat-img-wrapper">
            <?php
            $requete = 'SELECT * FROM cat_activite';
            foreach ($db->query($requete) as $row) {

              echo "<div class='cat-img'><div class='cat-img-link' id='". $row['id'] ."'><img src='images/paris.jpg'></div></div>";
            }
            ?>
          </div>
        </div>

        <div class="liste-activites">
          <?php
          //$requete_cat = 'SELECT * FROM cat_activite';
          $categories = $db->prepare('SELECT * FROM cat_activite');
          $categories->execute();

          foreach ($categories as $row_cat) {
            echo "<div class='page-activites". $row_cat['id'] ." fadeOut'>";

            //$requete_act = 'SELECT * FROM activite WHERE activite.categorie = "'.$row_cat["titre"]. '"';
            $activites = $db->query('SELECT * FROM activite WHERE activite.categorie = "'.$row_cat["titre"]. '"');
            $activites->execute();

            foreach ($activites as $row_act) {
              echo "<div class='activite'>";
              echo "<img src='images/". $row_act['img'] ."'>";
              echo "<div class='activite-content'>";
              echo "<h2>". $row_act['titre_act'] ."</h2>";
              echo "<p>". $row_act['texte'] ."</p>";
              echo "<a href='#' class='act-link' id='". $row_act['id'] .":". $row_act['titre_act'] ."'>Lien</a>";
              echo "</div>";
              echo "</div>";
            }
            echo "</div>";

          }
          $activites->closeCursor();
          $categories->closeCursor();
          ?>
        </div>
      </div>

      <div class="main-act">
        <button class="back-button">Retour</button>
        <?php
          $categories->execute();

          foreach($categories as $row_cat) {
            $activites = $db->query('SELECT * FROM activite WHERE activite.categorie = "'.$row_cat["titre"]. '"');
            $activites->execute();

            foreach($activites as $row_act) {
              echo "<div class='main-act-content". $row_act['id'] ." fadeOut'>";
              echo "<img class='main-act-img' src='images/". $row_act['img'] ."'>";
              echo "<h2 class='main-act-title'>". $row_act['titre_act'] ."</h2>";
              echo "<p class='main-act-text'>". $row_act['texte'] ."</p>";
              echo "</div>";
            }

          }
         ?>

      </div>
    </div>
  </div>


  <footer>
    <div class="mini-footer">
      <ul>
        <li>NOM DU CE</li>
        <li>Adresse</li>
        <li>Ville</li>
        <li>Téléphone</li>
      </ul>

      <p class="mini-foot-r">atou'CE, un produit atoucom</p>
    </div>
  </footer>

  <script
			  src="https://code.jquery.com/jquery-3.2.1.min.js"
			  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
			  crossorigin="anonymous"></script>
  <script src="js/mobile-menu.js"></script>
  <script src="js/page-activites.js"></script>
</body>
</html>
