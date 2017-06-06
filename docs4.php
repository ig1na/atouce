<?php include("../phpinc/includes/connexionDB.php"); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/static-menu.css">
    <link rel="stylesheet" href="css/main-content-docs.css">
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web|Patua+One|Lato|Palanquin+Dark|Open+Sans" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Les documents du CE</title>
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

      <div class="page-wrap">

        <div class="page-header">
          <h1>Les documents <span class="light-text">du CE</span></h1>
          <h3>visualiser et télécharger les informations du CE</h3>
        </div>
      </div>

      <div class="radio-btn-menu">
        <form action="">
          <!--<ul>-->
            <?php
              $radio_btn_menu = 'SELECT * FROM docs_toggle_menu ORDER BY id';

              foreach($db->query($radio_btn_menu) as $row) {
            ?>

              <!--<li>-->

                <!--<span><?php echo $row['cat']; ?></span>-->
                <!--<input type="checkbox" class="doc-type" id="doc-type-<?php echo $row['id']; ?>" name="file-type" value="<?php echo $row['cat']; ?>">
                <label for="doc-type-<?php echo $row['id']; ?>">regerg</label>-->
              <!--</li>-->

            <?php
              }
            ?>

            <!--<li>-->
            <label for="doc-type-all">
              <span>tous</span>
              <input type="checkbox" class="doc-type" id="doc-type-all" name="file-type" value="all" checked>
              </label>
              <label for="doc-type-all2">
                <span>tous</span>
                <input type="checkbox" class="doc-type" id="doc-type-all2" name="file-type" value="all" checked>
                </label>
                <label for="doc-type-all3">
                  <span>tous</span>
                  <input type="checkbox" class="doc-type" id="doc-type-all3" name="file-type" value="all" checked>
                  </label>
            <!--</li>-->
          <!--</ul>-->
        </form>
      </div>

      <div class="docs-list">

        <?php
          $docs = 'SELECT * FROM docs';

          foreach($db->query($docs) as $row) {
        ?>

        <div class="doc" id="doc-<?php echo $row['cat']; ?>-<?php echo $row['id']; ?>">
          <img class="file-icon" src="icones/<?php echo $row['filetype']; ?>.svg" />
          <h2><?php echo $row['titre']; ?></h2>
          <p><?php echo $row['description']; ?></p>
          <img class="download-icon" src="icones/download.png">
        </div>

        <?php
          }
        ?>

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
    <!--<script src="js/page-docs.js"></script>-->
  </body>
</html>
