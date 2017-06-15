<div class="admin-v-wrap fadeOut" id="admin-actus" cat="Actualités">

	<div class="actus">
		<div class="sect-title">
			<a href="#" class="accueil-add-btn" id="actus-add-btn">+</a>
			<h1>Mettre à jour les actualités</h1>
		</div>
		
			<div class="actus-list">
				<select class="select-menu" size="20">
				<?php
					$actus = $db->prepare('SELECT * FROM news ORDER BY date DESC');
					$actus->execute(); 
					$nb_actus = $db->query('SELECT COUNT(*) FROM news')->fetchColumn();

					foreach($actus as $row_i=>$row) {
				?>
					<option class="actus-opt" value="actu-update-<?= $row['num']; ?>"<?php if($row_i == 0) echo "selected"; ?>><?= $row['titre']; ?></option>
				<?php
					}
				?>
				</select>
			</div>

			<?php
				$actus->execute();

				foreach($actus as $row_i=>$row) {
					$num = $row['num'];
			?>

			<div class="actu-update <?php if($row_i != 0) echo 'fadeOut'; ?>" id="actu-update-<?= $num; ?>" num="<?= $num; ?>">
				<form method="post" action="">
					<div class="img-upload">
						<div class="croppie">
							<img class="first-img" src="../<?= $row['img']; ?>"/>
						</div>

						<input type="hidden" name="MAX_FILE_SIZE" value="5242880" />
					    <input type="file" name="image-file" class="image-file" value="<?= $img; ?>"/>
					    <button type="button" class="btn-sbm-img hide">Envoyer</button>
					</div>
				</form>

				<div class="actu-upd-form">
					<form method="post" action="">
						<div class="txt-upload">
							<input type="checkbox" name="checkbox-une" id="checkbox-une-<?= $num; ?>" <?php if($row['priority'] == '1') echo "checked" ?>>
							<label class="checkbox-une-label" for="checkbox-une-<?= $num; ?>">Mettre à la Une</label>

							<label for="title">Modifier le titre :</label>
							<input type="text" name="title" class="txt" maxlength="50" size="50" value="<?= $row['titre']; ?>" />
							<p class="max-char-nb">Maximum 50 caractères. Reste <span class="nb-remaining-chars"></span> caractères</p>

							<label for="texte_desc">Modifier la description :</label>
							<textarea name="texte_desc" class="txt" maxlength="1500" rows="5"><?= $row['texte_desc']; ?></textarea>
							<p class="max-char-nb">Maximum 1500 caractères. Reste <span class="nb-remaining-chars"></span> caractères</p>

							<label for="texte">Modifier le texte de l'actualité :</label>
							<textarea name="texte" class="txt" maxlength="1500" rows="10"><?= $row['texte']; ?></textarea>
							<p class="max-char-nb">Maximum 1500 caractères. Reste <span class="nb-remaining-chars"></span> caractères</p>


							<button type="button" class="btn-sbm-txt">Envoyer</button>
							<button type="button" class="btn-del" id="btn-del-actu">Supprimer</button>
						</div>
					</form>
				</div>
			</div>

			<?php
				}
			?>

	</div>

</div>