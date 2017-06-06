<?php include("../phpinc/includes/connexionDB.php"); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/static-menu.css">
    <link rel="stylesheet" href="css/main-content-contact.css">
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web|Patua+One|Lato|Palanquin+Dark|Open+Sans" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Contatez-nous</title>
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

          <li>
            <a href='<?php echo $row["link"]; ?>'>
              <p>
                <?php echo $row['name']; ?>
              </p>
            </a>
          </li>

          <?php
            }
          ?>
        </ul>
      </nav>

      <div class="page-wrapper">
        <div class="contact-backgr">
          <h1 class="contact-title">Contactez-nous</h1>
        </div>

        <form action="/action_page.php">

          <input type="text" name="nom" id="nom"  placeholder="Nom">
          <input type="text" name="prenom" id="prenom" placeholder="Prenom">
          <input type="text" name="mail" id="mail" placeholder="Adresse e-mail">

          <textarea rows="10" cols="60"></textarea>
          <input type="submit" value="Submit">
        </form>
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
      <script src="js/page-docs.js"></script>
    </body>
  </html>
