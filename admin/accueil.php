<div class="admin-v-wrap" id="admin-accueil" cat="Accueil">

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
        $cat = $row['zone'];
      
      include('update-col.php');
      }
    ?>
    </div>
  </div>

  <div class="articles">
    <div class="sect-title" id="sect-title-articles">
      <a href="#" class="accueil-add-btn" id="articles-add-btn">+</a>
      <h1>Modifier/Ajouter/Supprimer des colonnes</h1>
    </div>

    <div class="articles-col-wrapper">
      

      <?php
        $request = 'SELECT * FROM colonnes_accueil WHERE colonnes_accueil.zone = "articles"';

        foreach($db->query($request) as $row) {
          $id = $row['num'];
          $titre = $row['titre'];
          $img = $row['img'];
          $contenu = $row['contenu'];
          $cat = $row['zone'];

          include('update-col.php');
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