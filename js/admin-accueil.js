$(document).ready(function() {

	//detection du nombre de caractères restants
	$('.txt-input').each(function() {
		var $this = $(this);
		var nbRemainingChars = $this.children('.txt').attr('maxlength') - $this.val().length;
		var $remCharsSpan = $this.find('.nb-remaining-chars');

		$remCharsSpan.text(nbRemainingChars);

		if(nbRemainingChars <= 0) {
			$remCharsSpan.css('color', 'red');
			$this.next().css('color', 'red');
		}
	});

	//gestion des events pour ajout/modification des images et textes et pour suppression des colonnes
	//chaque event est gere independemment et il est possible d'ajouter/modifier une ou plusieurs colonne tout 
	//en modifiant ou supprimant une ou plusieurs colonnes
	$('#admin-accueil').on('click', '.sect-title .accueil-add-btn', function() {
		//gestion de l'ajout de nouvelle colonnes a la page d'accueil

		$.ajax({
			url: '../admin/add-col.php',
			type: 'POST',
			data: {
				zone: 'articles'
			}
		})
		.done(function() {
			console.log('success');
			$('.articles').load('index.php .articles-col-wrapper, #sect-title-articles');
		})
		.fail(function() {
			console.log('error');
		})
		.always(function() {
			console.log('complete');
		});

	}).on('click', '.update-col .btn-del-col', function() {
		//gestion de la suppression de colonnes de la page d'accueil

		updCol = $(this).closest('.update-col');
		num = updCol.attr('num');
		cat = updCol.attr('cat');

		$.ajax({
			url: '../admin/delete-col.php',
			type: 'POST',
			data: {
				num: num,
				zone: cat
			}
		})
		.done(function() {
			console.log('success');
			$('.articles').load('index.php .articles-col-wrapper, #sect-title-articles');
		})
		.fail(function() {
			console.log('error');
		})
		.always(function() {
			console.log('complete');
		});

	}).on('input', '.update-col .txt', function() {
		//gestion de l'affichage du nombre de caracteres restants pour chaque input

		$this = $(this);
		$remCharsSpan = $this.next().children('.nb-remaining-chars');
		nbRemainingChars = $this.attr('maxlength') - $this.val().length;

		$remCharsSpan.text(nbRemainingChars);

		if(nbRemainingChars <= 0) {
			$this.next().css('color', 'red');
			$remCharsSpan.css('color', 'red');
		} else {
			$this.next().css('color', 'black');
			$remCharsSpan.css('color', 'black');
		}

	}).on('click', '.update-col .btn-sbm-txt', function() {
		//gestion du bouton pour soumission de modification aux textes

		$this = $(this);
		$updCol = $this.closest('.update-col');
		zone = $updCol.attr('cat');
		id = $updCol.attr('num');
		title = $updCol.find('input[name="title"]').val();
		text = $updCol.find('textarea[name="txt"]').val();


		$.ajax({
			url: '../admin/upload-txt-accueil.php',
			type: 'POST',
			data: {
				zone: zone,
				id: id,
				title: title,
				text: text
			}
		})
		.done(function() {
			console.log("success");
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});


	}).on('change', '.update-col .image-file', function() {
		//apparition du cropper d'image lorsqu'un fichier est selectionne

		$this = $(this);
		$croppie = initCroppie($this.siblings('.croppie'), $this, 290, 200);

		$this.siblings('.btn-sbm-img').removeClass('hide');

	}).on('click', '.update-col .btn-sbm-img', function() {
		//gestion du bouton et soumission d'image croppee

		$this = $(this);
		$croppie = $this.siblings('.croppie');
		num = $this.closest('.update-col').attr('num');
		cat = $this.closest('.update-col').attr('cat');

		saveImg($croppie, 'accueil/' + cat, num, function() {
			$croppie.attr('class', 'croppie');
			$croppie.load("index.php .update-col[num='"+num+"'][cat='"+cat+"'] .croppie > img");
		});
		$this.addClass('hide');

	});
});
