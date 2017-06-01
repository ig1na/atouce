<?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  include("../phpinc/includes/connexionDB.php");
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/main-content-index2.css">
    <link rel="stylesheet" href="css/static-menu.css">
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web|Patua+One|Lato|Palanquin+Dark|Open+Sans" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
    <link rel="stylesheet" href="fullcalendar/fullcalendar.css"/>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Test</title>
  </head>
  <body>
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



    <div class="carousel">

      <?php
        $dir = "images/carousel/resized/*.jpg";

        $images = glob($dir);

        foreach( $images as $image ):
          echo "<div class='carousel-content'><div class='image' style='background: url(\"../". $image ."\") no-repeat; background-size: cover;'><div class='grey-background'></div></div><div class='carousel-link'><h1>Une équipe <span class='light-text'>à votre écoute</span></h1><a href='#'>Accéder à la page</a></div></div>";
        endforeach;

      ?>
      <!--<div><img src="images/entertainment.jpg" alt="billeterie"/><a href="#">test</a></div>
      <div><img src="images/cinema.jpg" alt="billeterie"/><a href="#">test</a></div>-->
    </div>


    <div class="main">
      <div class="main-content">
        <div class="hero">
          <?php
            $requete = 'SELECT * FROM colonnes_accueil WHERE colonnes_accueil.zone = "intro"';
            foreach($db->query($requete) as $row) {
          ?>

          <img src="images/accueil/intro/<?php echo $row['img']; ?>" />
          <div class="hero-content">
            <h2><?php echo $row['titre']; ?></h2>
            <p><?php echo $row['contenu']; ?></p>
          </div>

          <?php
            }
          ?>
        </div>

        <div class="columns">
          <?php
            $requete = 'SELECT * FROM colonnes_accueil WHERE colonnes_accueil.zone = "articles"';
            foreach($db->query($requete) as $row) {
            ?>

            <div class="main-column">
              <div class="column-img-wrapper">
                <div class="column-img">
                  <a href="<?php echo $row['link']; ?>">
                    <p>Visiter la page</p>
                  </a>
                  <img src="images/accueil/articles/<?php echo $row['num']; ?>/<?php echo $row['img']; ?>"/>
                </div>
              </div>
              <div class="column-content">
                <h2><?php echo $row['titre']; ?></h2>
                <p><?php echo $row['contenu']; ?></p>
              </div>
              <a href="<?php echo $row['link']; ?>">En savoir plus..</a>
            </div>

            <?php
            }
           ?>
        </div>
      </div>

      <div class="widget">
        <div class="widget-info">
          <img src="images/paris.jpg" alt="paris">
          <h3>Prochains événements</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,
            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
            nisi ut aliquip ex ea commodo consequat. </p>
        </div>

        <div id="calendar"></div>
      </div>

    </div>


    <footer>
      <form action="/action_page.php">
        <h2>Nous contacter :</h2>
        <label for="nom">Nom : </label>
        <input type="text" name="nom" id="nom"><br>
        <label for="prenom">Prénom :</label>
        <input type="text" name="prenom" id="prenom"><br>
        <label for="mail">Votre adresse mail :</label>
        <input type="text" name="mail" id="mail" ><br><br>
        <textarea rows="4" cols="40"></textarea>
        <input type="submit" value="Submit">
      </form>

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
    <script type="text/javascript" src="slick/slick.min.js"></script>
    <script type="text/javascript" src="js/slick.js"></script>
    <script src="fullcalendar/lib/moment.min.js"></script>
    <script src="js/mobile-menu.js"></script>
    <script src="fullcalendar/fullcalendar.js"></script>
    <script type="text/javascript" src="js/calendar.js"></script>
  </body>
</html>
