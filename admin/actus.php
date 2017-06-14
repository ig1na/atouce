<div class="admin-v-wrap fadeOut" id="admin-actus" cat="Actualités">

	<div class="actus">
		<div class="sect-title">
			<a href="#" class="accueil-add-btn" id="actus-add-btn">+</a>
			<h1>Mettre à jour les actualités</h1>
		</div>
		
			<?php
				$actus = $db->prepare('SELECT * FROM news ORDER BY date DESC');
				$actus->execute(); 
				$nb_actus = $db->query('SELECT COUNT(*) FROM news')->fetchColumn();
			?>

			<select class="select-menu" size="20">
				<?php
					foreach($actus as $row_i=>$row) {
				?>


						<option class="actus-opt" value="actu-update-<?= $row['num']; ?>"<?php if($row_i == 0) echo "selected"; ?>><?= $row['titre']; ?></option>
				<?php
					}
				?>
			</select>

			<?php
				$actus->execute();

				foreach($actus as $row_i=>$row) {
					$num = $row['num'];
			?>

			<div class="actu-update <?php if($row_i != 0) echo 'fadeOut'; ?>" id="actu-update-<?= $num; ?>" num="<?= $num; ?>">
				<form method="post" action="">
					<div class="img-upload">
						<div class="croppie">
							<img class="first-img" src="../images/news/<?= $num; ?>/<?= $row['img']; ?>"/>
						</div>

						<input type="hidden" name="MAX_FILE_SIZE" value="5242880" />
					    <input type="file" name="image-file" class="image-file" value="<?= $img; ?>"/>
					    <button type="button" class="btn-sbm-img hide">Envoyer</button>
					</div>
				</form>

				<div class="actu-upd-form">
					<form method="post" action="">
						<div class="txt-upload">
							<label for="title">Modifier le titre :</label>
							<input type="text" name="title" class="txt" maxlength="50" size="50" value="<?= $row['titre']; ?>" />

							<label for="texte_desc">Modifier la description :</label>
							<textarea name="texte_desc" class="txt" maxlength="1500" rows="5"><?= $row['texte_desc']; ?></textarea>

							<label for="texte">Modifier le texte de l'actualité :</label>
							<textarea name="texte" class="txt" maxlength="1500" rows="10"><?= $row['texte']; ?></textarea>

							<button type="button" class="btn-sbm-txt">Envoyer</button>
						</div>
					</form>
				</div>
			</div>

			<?php
				}
			?>

	</div>

</div>