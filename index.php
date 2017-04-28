<?php include("../phpinc/includes/connexionDB.php"); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/main-content-index.css">
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
      <input type="checkbox" id="menu">
      <label for="menu" onclick></label>
      <ul>
        <li><a href=""><p>Accueil</p></a></li>
        <li><a href="/activites.php"><p>Activités</p></a></li>
        <li><a href="/elus.php"><p>Votre CE</p></a></li>
        <li><a href="#"><p>Les budgets</p></a></li>
        <li><a href="#"><p>L'agenda du CE</p></a></li>
        <li><a href="admin/"><p>Admin</p></a></li>
      </ul>
    </nav>

    <?php
      //phpinfo();
      ini_set('display_errors', 1);
      ini_set('display_startup_errors', 1);
      error_reporting(E_ALL);

      require 'vendor/autoload.php';

      $imagine = new Imagine\Gd\Imagine();

      use Imagine\Image\Box;
      use Imagine\Image\Point;

      $dir = "images/carousel/*.jpg";
      $images = glob($dir);
      $nb = 0;

      $size;
      $height;

      foreach( $images as $image ):
        $openedImage = $imagine->open($image);
        $size = $openedImage->getSize();
        $height = $size->getHeight() * (1920 / $size->getWidth());
        $openedImage->resize(new Box(1920, $height))->save('images/carousel/resized/'.$nb.'.jpg');
        $nb++;
      endforeach;

    ?>

    <div class="carousel">

      <?php
        $dir = "images/carousel/resized/*.jpg";

        $images = glob($dir);

        foreach( $images as $image ):
          echo "<div class='carousel-content'><div class='carousel-link'><h1>Une équipe <span class='light-text'>à votre écoute</span></h1><a href='#'>Accéder à la page</a></div><img src='" . $image . "'></div>";
        endforeach;

      ?>
      <!--<div><img src="images/entertainment.jpg" alt="billeterie"/><a href="#">test</a></div>
      <div><img src="images/cinema.jpg" alt="billeterie"/><a href="#">test</a></div>-->
    </div>


    <div class="main">
      <div class="main-content">
        <div class="hero">
        <img src="images/profile-5.jpg" alt="president du CE">
          <div class="content">
            <h2>Un mot de votre C.E.</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,
              sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
              Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
              nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
              reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
              pariatur. Excepteur sint occaecat cupidatat non proident,
              sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
          </div>
        </div>

        <div class="columns">

          <?php
            $requete = 'SELECT * FROM colonnes_accueil';
            foreach($db->query($requete) as $row) {
              echo '<div class="main-column">';
              echo '<div class="column-img-wrapper"><a href="'. $row['link'] .'"><p>Visiter la page</p></a><img src="images/'. $row['img'] .'"></div>';
              echo '<div class="column-content"><h2>'. $row['titre'] .'</h2><p>'. $row['contenu'] .'</p></div>';
              echo '<a href="'. $row['link'] .'">En savoir plus..</a>';
              echo '</div>';
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
			  src="https://code.jquery.com/jquery-1.12.4.js"
			  integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU="
			  crossorigin="anonymous"></script>
    <script type="text/javascript" src="slick/slick.min.js"></script>
    <script type="text/javascript" src="js/slick.js"></script>
    <script src="fullcalendar/lib/moment.min.js"></script>
    <script src="fullcalendar/fullcalendar.js"></script>
    <script type="text/javascript" src="js/calendar.js"></script>
  </body>
</html>
