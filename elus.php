<?php include("../phpinc/includes/connexionDB.php"); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/static-menu.css">
    <link rel="stylesheet" href="css/main-content-elus.css">
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web|Patua+One|Lato|Palanquin+Dark|Open+Sans" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Votre CE</title>
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

    <div class="main">

      <div class="intro">
        <img src="images/profile.gif"/>
        <div class="intro-txt">
          <h2>LE RÔLE DU CE</h2>
          <p>Il participe à la vie et à la marche générale de l'établissement.
             Le CE est consulté par l'employeur sur les questions portant sur la gestion de l'évolution économique et financière de l'entreprise,
             notamment l'organisation du temps de travail, l'introduction de nouvelles technologies, l'évolution et les plans de sauvegarde de
             l'emploi, la formation et l'égalité professionnelle.</p>
        </div>
      </div>
    </div>

    <div class="ribbon">
      <div class="main">
        <h2>Le bureau du CE</h2>
        <div class="elus-wrapper">
        <?php
          $requete = 'SELECT * FROM elus';
          foreach ($db->query($requete) as $row) {
            echo '<div class="elu">';
            echo '<img src="images/profile.gif" alt="">';
            echo  '<div class="nom-elu"><h2><span class="light-text">'. $row['prenom'] .'</span> '. $row['nom'] .'</h2></div>';
            echo '<h3>'. $row['role'] .'</h3>';
            echo '<p>' . $row['syndicat'] .'</p>';
            echo '<p>' . $row['commission'] .'</p>';
            echo '<p>' . $row['tel'] .'</p>';
            echo '<p>' . $row['mail']. '</p>';
            echo '</div>';
          }
          ?>
        </div>
      </div>
    </div>

    <div class="main">

      <div class="members">
        <h2>Les membres du CE</h2>
        <div class="member-wrapper">
          <?php
            $requete = 'SELECT * FROM membres';
            foreach ($db->query($requete) as $row) {
              echo '<div class="member">';
              echo '<img src="images/profile.gif" alt="">';
              echo  '<div class="nom-elu"><h2><span class="light-text">'. $row['prenom'] .'</span> '. $row['nom'] .'</h2></div>';
              echo '<h3>'. $row['role'] .'</h3>';
              echo '<p>' . $row['syndicat'] .'</p>';
              echo '<p>' . $row['commission'] .'</p>';
              echo '<p>' . $row['tel'] .'</p>';
              echo '<p>' . $row['mail']. '</p>';
              echo '</div>';
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
  </body>
</html>
