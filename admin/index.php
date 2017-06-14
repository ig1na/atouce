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

    <div class="main">

      <div class="main-admin">

        <div class="admin-menu">

          <?php
            $admin_menu_cat = 'SELECT DISTINCT cat FROM menu_admin';
            $i_cat = 1;

            foreach($db->query($admin_menu_cat) as $row_cat) {
              $cat = $row_cat['cat'];
              
          ?>

          <h3><?= $cat; ?></h3>
          <ul>

            <?php
              $admin_menu = 'SELECT * FROM menu_admin WHERE cat = "' . $cat . '"';
              $id = 1;

              foreach($db->query($admin_menu) as $row) {
                $name = $row['name'];
            ?>

            <li><a href="#" class="link-admin" num="<?= $id; ?>" cat="<?= $cat; ?>"><?= $name; ?></a></li>

            <?php
                $id++;
              }
            ?>

          </ul>

          <?php
              $i_cat++;
            }
          ?>

        </div>
          <?php include('accueil.php');
                include('actus.php');
           ?>

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
    <script type="text/javascript" src="../js/admin-actus.js"></script>
    <script type="text/javascript" src="../js/admin.js"></script>

  </body>
</html>
