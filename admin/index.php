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
        <li><a href="#"><p>Modifier l'accueil</p></a></li>
        <li><a href="#"><p>Modifier les activités</p></a></li>
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
            <li><a href="#" class="link-accueil" num="1">Intro</a></li>
            <li><a href="#" class="link-accueil" num="2">Colonnes</a></li>
            <li><a href="#" class="link-accueil" num="3">Widgets</a></li>
          </ul>
        </div>

        <div class="accueil">

          <div class="intro">
            <div class="sect-title"><h1>Modifier l'intro</h1></div>

            <div class="intro-col-wrapper">
            <?php
              $request = 'SELECT * FROM colonnes_accueil WHERE colonnes_accueil.zone = "intro"';

              foreach($db->query($request) as $row) {
                $img = $row['img'];
                $id = $row['num'];
                $titre = $row['titre'];
                $contenu = $row['contenu'];
              ?>

              <div class="update-col" num="<?= $id; ?>" cat="intro">

                <form method="post" action="" enctype="multipart/form-data">
                  <h3>Modifier l'image :</h3>
                  <div class="image-upload">
                    <div class="croppie">
                      <img src="../images/accueil/intro/<?= $id; ?>/<?= $img; ?>" />
                    </div>

                    <input type="hidden" name="MAX_FILE_SIZE" value="5242880" />
                    <input type="file" name="image-file" class="image-file" value="<?= $img; ?>"/>
                    <button type="button" class="btn-sbm-img hide">Envoyer</button>
                  </div>
                </form>

                <form method="post" action="">
                  <h3>Modifier le texte :</h3>
                  <div class="txt-upload">
                    <label for="title">Modifier le titre :</label>
                    <input type="text" name="title" class="title" maxlength="50" value="<?= $titre; ?>"/>
                    <p class="max-char-nb-title">Maximum 50 caractères. Reste <span class="nb-remaining-chars-title"></span> caractères</p>
                    <label for="txt">Modifier le texte d'intro :</label>
                    <textarea name="txt" class="txt" maxlength="1500" rows="10" cols="40"><?= $contenu; ?></textarea>
                    <p class="max-char-nb-txt">Maximum 1500 caractères. Reste <span class="nb-remaining-chars-txt"></span> caractères</p>
                    <button type="button" class="btn-sbm-txt">Envoyer</button>
                  </div>
                </form>
              </div>
            <?php
              }
            ?>
            </div>
          </div>

          <div class="articles">
            <div class="sect-title">
              <h1>Modifier/Ajouter/Supprimer des colonnes</h1>
            </div>

            <div class="articles-col-wrapper">
              <a href="#" class="accueil-add-btn" id="articles-add-btn">+</a>

              <?php
                $request = 'SELECT * FROM colonnes_accueil WHERE colonnes_accueil.zone = "articles"';

                foreach($db->query($request) as $row) {
                  $id = $row['num'];
                  $titre = $row['titre'];
                  $img = $row['img'];
                  $contenu = $row['contenu'];
               ?>

               <div class="update-col" num="<?= $id; ?>" cat="articles">

                <form method="post" action="" enctype="multipart/form-data">
                  <h3>Modifier l'image :</h3>
                  <div class="image-upload">
                    <div class="croppie">
                      <img src="../images/accueil/articles/<?= $id; ?>/<?= $img; ?>" />
                    </div>
                    <input type="hidden" name="MAX_FILE_SIZE" value="5242880" />
                    <input type="file" name="image-file" class="image-file" />
                    <button type="button" class="btn-sbm-img hide">Envoyer l'image</button>
                  </div>
                </form>

                <form method="post" action="">

                  <h3>Modifier le texte :</h3>
                  <div class="txt-upload">
                    <label for="title">Modifier le titre :</label>
                    <input type="text" name="title" class="title" maxlength="50" value="<?= $titre; ?>"/>
                    <p class="max-char-nb-title">Maximum 50 caractères. Reste <span class="nb-remaining-chars-title"></span> caractères</p>
                    <label for="txt">Modifier le texte :</label>
                    <textarea name="txt" class="txt" maxlength="1500" rows="10" cols="40"><?= $contenu; ?></textarea>
                    <p class="max-char-nb-txt">Maximum 1500 caractères. Reste <span class="nb-remaining-chars-txt"></span> caractères</p>
                    <button type="button" class="btn-sbm-txt">Envoyer le texte</button>
                  </div>
                </form>
              </div>
              <?php
                }
              ?>
            </div>
          </div>

          <div class="widgets">
            <div class="sect-title"><h1>Gérer les widgets</h1></div>

            <div class="widgets-col-wrapper">


            </div>
          </div>


        </div>
      </div>
    </div>

    <script
			  src="https://code.jquery.com/jquery-3.2.1.min.js"
			  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
			  crossorigin="anonymous"></script>
    <script type="text/javascript" src="../croppie/croppie.js"></script>
    <script type="text/javascript" src="../js/image-crop.js"></script>
    <script type="text/javascript" src="../js/upload-txt-accueil.js"></script>
    <script type="text/javascript" src="../js/admin-accueil.js"></script>
    <script type="text/javascript" src="../js/admin.js"></script>

  </body>
</html>
