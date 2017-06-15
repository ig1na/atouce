<div class="update-col" num="<?= $id; ?>" cat="<?= $cat; ?>">
  <form method="post" action="" enctype="multipart/form-data">
    <h3>Modifier l'image :</h3>
    <div class="image-upload">
      <div class="croppie">
        <img src="../<?= $img; ?>" />
      </div>

      <input type="hidden" name="MAX_FILE_SIZE" value="5242880" />
      <input type="file" name="image-file" class="image-file" value="<?= $img; ?>"/>
      <button type="button" class="btn-sbm-img hide">Envoyer</button>
    </div>
  </form>

  <form method="post" action="">
    
    <div class="txt-upload">
      <h3>Modifier le texte :</h3>
      <label for="title">Modifier le titre :</label>
      <div class="txt-input">
        <input type="text" name="title" class="txt" maxlength="50" value="<?= $titre; ?>"/>
        <p class="max-char-nb">Maximum 50 caractères. Reste <span class="nb-remaining-chars"></span> caractères</p>
      </div>
      <label for="txt">Modifier le texte :</label>
      <div class="txt-input">
        <textarea name="txt" class="txt" maxlength="1500" rows="10" cols="40"><?= $contenu; ?></textarea>
        <p class="max-char-nb">Maximum 1500 caractères. Reste <span class="nb-remaining-chars"></span> 
        caractères</p>
      </div>
      <button type="button" class="btn-sbm-txt">Envoyer</button>
      <?php if($cat == "articles") { ?>
        <button type="button" class="btn-del" id="btn-del-col-<?= $id; ?>">Supprimer</button>
      <?php } ?>
    </div>
  </form>
</div>