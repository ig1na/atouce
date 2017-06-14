<?php include("../phpinc/includes/connexionDB.php"); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/static-menu.css">
    <link rel="stylesheet" href="css/main-content-actus.css">
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web|Patua+One|Lato|Palanquin+Dark|Open+Sans" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Actualités</title>
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

          <div class="important-news">

            <div class="news-slider">

              <?php
                $important_news = 'SELECT * FROM news WHERE news.priority = "1"';

                foreach($db->query($important_news) as $row) {
              ?>

              <div class="news-slider-content">
                <div class="news-slider-img" style="background: url('images/news/<?php echo $row['num']; ?>/<?php echo $row['img']; ?>'); background-size: cover;"> </div>

                <h3><?php echo $row['titre']; ?></h3>
                <p><?php echo $row['texte_desc']; ?></p>
                <a class="news-button" id="important-news-<?php echo $row['num']; ?>" href="#">Lire la suite</a>
              </div>

              <?php
                }
              ?>

            </div>
          </div>

          <div class="liste-news">

            <?php
              $news = 'SELECT * FROM news';

              foreach($db->query($news) as $row) {
            ?>

              <div class="liste-news-item" id="liste-news-item<?php echo $row['num']; ?>">
                <img src="images/news/<?php echo $row['num']; ?>/<?php echo $row['img']; ?>"/>
                <h3><?php echo $row['titre']; ?></h3>
                <p><?php echo $row['texte_desc']; ?></p>
                <a class="news-button" id="news-<?php echo $row['num']; ?>" href="#">Lire la suite</a>
              </div>

            <?php
              }
            ?>

          </div>
        </div>

        <div class="main-news">
          <button class="back-button">Retour</button>

          <?php
            $entire_news = 'SELECT * FROM news';

            foreach ($db->query($entire_news) as $row) {
          ?>

          <div class="full-news fadeOut" id="full-news-<?php echo $row['num']; ?>">
            <img src="images/news/<?php echo $row['num']; ?>/<?php echo $row['img']; ?>"/>
            <h3><?php echo $row['titre']; ?></h3>
            <p><?php echo $row['texte']; ?></p>
          </div>

          <?php
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
    <script type="text/javascript" src="slick/slick.min.js"></script>
    <script src="js/slick.js"></script>
    <script src="js/page-actus.js"></script>
  </body>
</html>
