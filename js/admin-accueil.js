$(document).ready(function() {

	//gestion du menu, fait glisser la page en fonction du menu choisi
	$accueil = $('.accueil');

	$('.link-accueil').click(function() {
		$accueil.attr('class', 'accueil');
		switch($(this).attr('num')) {
			case '1' :
				$accueil.addClass('show-1');
				break;
			case '2' :
				$accueil.addClass('show-2');
				break;
			case '3' :
				$accueil.addClass('show-3');
				break;
		}
	});

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

	$('.accueil').on('click', '.articles-col-wrapper .accueil-add-btn', function() {
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

		var updCol = $(this).closest('.update-col');
		var num = updCol.attr('num');
		var cat = updCol.attr('cat');

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
			$('.articles').load('index.php .articles-col-wrapper');
		})
		.fail(function() {
			console.log('error');
		})
		.always(function() {
			console.log('complete');
		});

	}).on('input', '.update-col .txt', function() {
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
		$this = $(this);
		$croppie = initCroppie($this.siblings('.croppie'), $this, 290, 200);

		$this.siblings('.btn-sbm-img').removeClass('hide');

	}).on('click', '.update-col .btn-sbm-img', function() {
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
