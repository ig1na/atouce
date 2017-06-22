<div class="admin-v-wrap show-v-2" id="admin-activites" cat="Activités">

	<div class="cats">
		<div class="sect-title">
			<a href="#" class="accueil-add-btn" id="categorie-act-add-btn">+</a>
			<form method="POST" class="new-cat-name">
				<input type="text" name="cat-name" placeholder="Entrez le nom de la nouvelle catégorie..." size="30"/>
				<button type="button" name="cat-name" class="valid-btn-top">Valider</button>
			</form>

			<h1>Gestion des catégories d'activités</h1>
		</div>
		<h3 class="too-much-cats hide">Vous ne pouvez pas ajouter plus de 5 catégories</h3>
		<h3 class="cat-name-exists hide">Ce nom de catégorie est déjà pris</h3>
		<div class="cats-act-list">
			<?php 
				$cats = 'SELECT * FROM cat_activite';

				foreach($db->query($cats) as $row_cats_act) {
			?>
					<form method="POST" class="cat-act-form" num="<?= $row_cats_act['num']; ?>">
						<div class="croppie">
							<img class="cat-act-img" src="../<?= $row_cats_act['img']; ?>">
						</div>
						<input type="hidden" name="MAX_FILE_SIZE" value="5242880" />
						<input type="file" name="image-file" class="image-file" id="image-file-cat"/>
						<button type="button" class="btn-sbm-img hide">Envoyer</button>
						<div class="cat-update">
							<h2 class="cat-act-title"><?= $row_cats_act['titre']; ?></h2>

							<label>Modifier le titre:
								<input type="text" name="cat-title" class="txt" maxlength="50" size="35">
							</label>

							<button type="button" class="btn-sbm-title">Envoyer</button>
							<button type="button" class="btn-del category" id="btn-del-cat-<?= $row_cats_act['num']; ?>">Supprimer</button>
						</div>
					</form>
			<?php
				}
			?>
		</div>
		<div id="dialog-del-cat" title="Suppression de catégorie">Voulez-vous vraiment supprimer cette catégorie?</div>
	</div>

	<div class="activities">
		<div class="sect-title">
			<a href="#" class="accueil-add-btn" id="act-add-btn">+</a>

			<form method="POST" class="cat-choice-new-act">
				<div class="select-cat-menu-new-act">
					<label>Séléctionnez la catégorie
						<select>
							<?php 
								$cats_selector = 'SELECT titre FROM cat_activite';

								foreach($db->query($cats) as $row_cats_selector) {
							?>
							<option class="cats-selector"><?= $row_cats_selector['titre']; ?></option>
							<?php
								}
							?>
						</select>
					</label>
					<label>et la date :
						<input type="text" class="new-act-date" size="6">
					</label>
					<button type="button" class="valid-btn-top" id="valid-btn-top-act">Ajouter</button>
				</div>
			</form>

			<form method="POST" class="cat-choice">
				<div class="select-cat-menu" id="select-cat-menu-right">
					<label>Séléctionnez une catégorie d'activité
						<select>
							<?php 
								$cats_selector = 'SELECT titre FROM cat_activite';

								foreach($db->query($cats) as $row_cats_selector) {
							?>
							<option class="cats-selector"><?= $row_cats_selector['titre']; ?></option>
							<?php
								}
							?>
						</select>
					</label>
				</div>
			</form>

			<h1>Gestion des activités</h1>
		</div>

		<h3 class="choose-a-date hide">Veuillez choisir une date pour la nouvelle activité</h3>

		<?php 
				$activities_cat = 'SELECT DISTINCT categorie FROM activite';

				foreach($db->query($activities_cat) as $row_act_cat) {

			?>

		<div class="act-col-list fadeOut" cat="<?= $row_act_cat['categorie']; ?>">
			<h3 class="act-col-title"><?= $row_act_cat['categorie']; ?></h3>
			<?php 
				$activities = 'SELECT * FROM activite WHERE categorie = "'. $row_act_cat["categorie"] .'" ORDER BY date DESC';

				foreach($db->query($activities) as $row_act) {

				?>
					
					<form method="POST" class="act-col" num="<?= $row_act['num']; ?>" cat="<?= $row_act['categorie']; ?>">
						<div class="croppie">
							<img class="act-img" src="../<?= $row_act['img']; ?>">
						</div>
						<input type="hidden" name="MAX_FILE_SIZE" value="5242880" />
						<input type="file" name="image-file" class="image-file-act" />
						<button type="button" class="btn-sbm-img hide">Envoyer</button>

						<p>Choisir la date de l'activité :</p>
						<input type="text" class="act-date" name="act-date" date="<?= $row_act['date']; ?>" value="<?= $row_act['date']; ?>" size="6">
				

						<p>Modifier le titre :</p>
						<input type="text" name="act-title" class="txt" maxlength="50" size="25" value="<?= $row_act['titre_act']; ?>">
						<p class="max-char-nb">Maximum 50 caractères. Reste <span class="nb-remaining-chars"></span> caractères</p>

						<p>Modifier le texte :</p>
						<textarea class="txt" name="act-txt" maxlength="1500" rows="15"><?= $row_act['texte']; ?></textarea>
						<p class="max-char-nb">Maximum 1500 caractères. Reste <span class="nb-remaining-chars"></span> caractères</p>

						<button type="button" class="btn-del activity">Supprimer</button>	

						<button type="button" class="btn-sbm-txt">Envoyer</button>

					</form>

			<?php
				}
			?>

		</div>

		<?php
			}
		?>
		<div id="dialog-del-act" title="Suppression d'activité">Voulez-vous vraiment supprimer cette activité?</div>
	</div>
</div>