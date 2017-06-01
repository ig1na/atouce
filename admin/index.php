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
            <li><a href="#" class="first-link-accueil">Intro</a></li>
            <li><a href="#" class="second-link-accueil">Colonnes</a></li>
            <li><a href="#" class="third-link-accueil">Widgets</a></li>
          </ul>
        </div>

        <div class="accueil">

          <div class="intro">
            <div class="sect-title"><h1>Modifier l'intro</h1></div>

            <div class="intro-col-wrapper">
            <?php
              $request = 'SELECT * FROM colonnes_accueil WHERE colonnes_accueil.zone = "intro"';

              foreach($db->query($request) as $row) {
              ?>

              <div class="intro-col">

                <form method="post" action="" enctype="multipart/form-data">

                  <h3>Modifier l'image :</h3>

                  <div class="image-upload">

                    <div id="intro-croppie">
                      <img src="../images/accueil/intro/<?php echo $row['img']; ?>" />
                    </div>

                    <input type="hidden" name="MAX_FILE_SIZE" value="5242880" />

                    <input type="file" name="image-chooser" id="image-chooser-intro" value="<?php echo $row['img'] ?>"/>

                    <button type="button" class="btn-smb-intro-img" id="btn-sbm-intro-img<?php echo $row['num']; ?>">Envoyer</button>
                  </div>
                </form>

                <form method="post" action="">

                  <h3>Modifier le texte :</h3>

                  <label for="intro-title">Modifier le titre :</label>

                  <input type="text" name="intro-title" id="intro-title" value="<?php echo $row['titre']; ?>"/>

                  <label for="txt">Modifier le texte d'intro :</label>

                  <textarea name="txt" id="intro-textarea" rows="10" cols="40"><?php echo $row['contenu']; ?></textarea>

                  <button type="button" class="btn-sbm-intro-txt" id="btn-sbm-intro-txt<?php echo $row['num']; ?>">Envoyer</button>
                </form>

              </div>
            <?php
              }
            ?>

            </div>

          </div>

          <div class="articles">
            <div class="sect-title"><h1>Modifier/Ajouter/Supprimer des colonnes</h1></div>

            <div class="articles-col-wrapper">

              <a href="#" class="accueil-add-btn" id="articles-add-btn">+</a>

              <?php
                $request = 'SELECT * FROM colonnes_accueil WHERE colonnes_accueil.zone = "articles"';

                foreach($db->query($request) as $row) {
                  $id = $row['num'];
               ?>

               <div class="article-col" id="articles-col-<?php echo $id; ?>">

                <form method="post" action="" enctype="multipart/form-data">
                  <h3>Modifier l'image :</h3>
                  <div class="image-article-upload" id="image-article-upload-<?php echo $id; ?>">

                    <div class="article-croppie" id="article-croppie-<?php echo $id; ?>">
                      <img src="../images/accueil/articles/<?php echo $row['num']; ?>/<?php echo $row['img']; ?>" />
                    </div>

                    <input type="hidden" name="MAX_FILE_SIZE" value="5242880" />

                    <input type="file" name="image-chooser-article" class="image-chooser-article" id="image-chooser-article-<?php echo $id; ?>" />

                    <button type="button" class="btn-sbm-article-img" id="btn-sbm-article-img-<?php echo $id; ?>">Envoyer l'image</button>
                  </div>
                </form>

                <form method="post" action="">

                  <h3>Modifier le texte :</h3>
                  <div class="article-txt-upload" id="article-txt-upload-<?php echo $id; ?>">
                    <label for="article-title-<?php echo $id; ?>" id="article-title-label-<?php echo $id; ?>">Modifier le titre :</label>

                    <input type="text" name="article-title-<?php echo $id; ?>" id="article-title-input-<?php echo $id; ?>" value="<?php echo $row['titre']; ?>"/>

                    <label for="article-txt-<?php echo $id; ?>" id="article-txt-label-<?php echo $id; ?>">Modifier le texte :</label>

                    <textarea name="article-txt-<?php echo $id; ?>" id="article-textarea-<?php echo $id; ?>" rows="10" cols="40"><?php echo $row['contenu']; ?>
                    </textarea>

                    <button type="button" class="btn-sbm-article-txt" id="btn-sbm-article-txt-<?php echo $id; ?>">Envoyer le texte</button>

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
    <script type="text/javascript" src="../js/admin.js"></script>
  </body>
</html>
