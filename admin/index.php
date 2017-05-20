<?php 
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  include("../../phpinc/includes/connexionDB.php"); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/admin-main.css"/>
    <link rel="stylesheet" href="../css/styles.css"/>
    <link rel="stylesheet" href="../css/admin-menu.css"/>
    <link rel="stylesheet" href="../croppie/croppie.css"/>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Accueil Admin</title>
  </head>
  <body>

    <header class="header-wrapper">
      <h1 class="header-text">atou'ce</h1>

      <div class="logo-wrapper">
        <img src="../images/atouce.png" alt="logo atouce"/>
      </div>

    </header>

    <div class="menu">
      <ul>
        <li><a href="#"><p>Modifier la page d'accueil</p></a></li>
        <li><a href="#"><p>Ajouter et modifier les images</p></a></li>
        <li><a href="#"><p>Ajouter et modifier les élus</p></a></li>
        <li><a href="#"><p></p></a></li>
        <li><a href="#"><p></p></a></li>
        <li><a href="#"><p></p></a></li>
      </ul>
    </div>

    <div class="main">

      <div class="main-accueil">

        <div class="accueil-menu">
          <ul>
            <li><a href="#" class="first-link-accueil">Intro</a></li>
            <li><a href="#" class="second-link-accueil">Colonnes</a></li>
            <li><a href="#" class="third-link-accueil">Widgets</a></li>
          </ul>
        </div>

        <div class="accueil">

          <div class="intro">
            <h1>Modifier l'intro</h1>

            <div class="intro-column-wrapper">
            <?php 
              $request = 'SELECT * FROM colonnes_accueil WHERE colonnes_accueil.zone = "intro"';

              foreach($db->query($request) as $row) {
              ?>

              <div class="intro-column">

                <form method="post" action="" enctype="multipart/form-data">
                  <h3>Modifier l'image :</h3>
                  <div class="image-upload">
                    <div class="fadeOut" id="intro-croppie"></div>
                    <input type="hidden" name="MAX_FILE_SIZE" value="5242880" />
                    <input type="file" name="image-chooser" id="image-chooser-intro" />
                    <button type="button" id="btn-sbm-intro-img">Envoyer</button>
                  </div>
                </form>

                <form method="post" action="">
                  <h3>Modifier le texte :</h3>
                  <label for="titre">Modifier le titre :</label>
                  <input type="text" name="titre" id="intro-title" value="<?php echo $row['titre']; ?>"/>
                  <label for="txt">Modifier le texte d'intro :</label>
                  <textarea name="txt" id="intro-textarea"><?php echo $row['contenu']; ?></textarea>
                  <button type="button" id="btn-sbm-intro-txt">Envoyer</button>
                </form>

              </div>
            <?php
              }
            ?>

            </div>

          </div>

          <div class="articles">
            <h1>Modifier/Ajouter/Supprimer des colonnes</h1>

            <div class="articles-column-wrapper">
            </div>
          </div>

          <div class="widgets">
            <h1>Gérer les widgets</h1>

            <div class="widgets-column-wrapper"></div>
          </div>


        </div>
      </div>
    </div>

    <script
			  src="https://code.jquery.com/jquery-3.2.1.min.js"
			  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
			  crossorigin="anonymous"></script>
    <script type="text/javascript" src="../js/admin.js"></script>
    <script type="text/javascript" src="../croppie/croppie.js"></script>
    <script type="text/javascript" src="../js/image-crop.js"></script>
  </body>
</html>
