<div class="admin-v-wrap" id="admin-activites" cat="Activités">

	<div class="cats">
		<div class="sect-title">
			<a href="#" class="accueil-add-btn" id="categorie-act-add-btn">+</a>
			
			<h1>Gestion des catégories d'activités</h1>
		</div>
		<h3 class="too-much-cats hide">Vous ne pouvez pas ajouter plus de 5 catégories</h3>
		<div class="cats-act-list">
			<?php 
				$cats = 'SELECT * FROM cat_activite';

				foreach($db->query($cats) as $row_cats_act) {
			?>
					<form class="cat-act-form">
						<div class="croppie">
							<img class="cat-act-img" src="../<?= $row_cats_act['img']; ?>">
						</div>
						<input type="hidden" name="MAX_FILE_SIZE" value="5242880" />
						<input type="file" name="image-file" class="image-file"/>
						<button type="button" class="btn-sbm-img hide">Envoyer</button>

						<h2 class="cat-act-title"><?= $row_cats_act['titre']; ?></h2>

						<label>Modifier le titre: <br>
							<input type="text" name="cat-title" class="txt" maxlength="50" size="35">
						</label>

						<button type="button" class="btn-sbm-txt">Envoyer</button>
						<button type="button" class="btn-del" id="btn-del-cat-<?= $row_cats_act['id']; ?>">Supprimer</button>
					</form>
			<?php
				}
			?>
		</div>
	</div>

	<div class="activities">
		<div class="sect-title">
			<a href="#" class="accueil-add-btn" id="act-add-btn">+</a>
			<h1>Gestion des activités</h1>
	</div>
</div>