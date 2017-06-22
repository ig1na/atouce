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
      <div class="menu-button">
        <a class="threelines-button" href="#menu">
        </a>
      </div>
      <ul>
        <?php
          $menu_request = 'SELECT * FROM menu';

          foreach($db->query($menu_request) as $row) {
        ?>
        <li><a href="<?php echo $row['link']; ?>"><p><?php echo $row['name']; ?></p></a></li>
        <?php
          }
        ?>
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
            foreach ($db->query($requete) as $i=>$row) {
            ?>

              <div class="cat-img">
              	<div class="cat-img-link" id="cat-img-link-<?=$row['num'];?>" number="<?= $i ?>">
              		<img src="<?= $row['img']; ?>">
              	</div>
                <h2 class="cat-title"><?= $row['titre']; ?></h2>
              </div>

              

            <?php
            }
            ?>

          </div>
        </div>

        <div class="liste-activites">
          <?php
          //$requete_cat = 'SELECT * FROM cat_activite';
          $categories = $db->prepare('SELECT * FROM cat_activite');
          $categories->execute();
          $act_index = 0;

          foreach ($categories as $cat_index=>$row_cat) {
          ?>
            <div class="page-activites fadeOut" id="page-activites-<?= $row_cat['num']; ?>" number="<?= $cat_index ?>">

            <?php
            $requete_act = 'SELECT * FROM activite WHERE activite.categorie = "'.$row_cat["titre"]. '" ORDER BY activite.date DESC';
            $activites = $db->query($requete_act);
            $activites->execute();

            foreach ($activites as $row_act) {
            	
            ?>

              <div class="activite">
              <img src="<?= $row_act['img']; ?>">
              <div class="activite-content">
              <h2><?= $row_act['titre_act']; ?></h2>
              <p><?= $row_act['texte']; ?></p>
              <a href="#" class="act-link" number="<?= $act_index ?>">Lien</a>
              </div>
              </div>

            <?php
            $act_index++;
            }
            ?>

           	</div>

          <?php
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
        ?>
              <div class='main-act-content fadeOut'>
	              <img class='main-act-img' src='<?= $row_act['img'] ?>'>
	              <h2 class='main-act-title'><?= $row_act['titre_act'] ?></h2>
	              <p class='main-act-text'><?= $row_act['texte'] ?></p>
              </div>

            <?php
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
