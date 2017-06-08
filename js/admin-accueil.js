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

	//gere l'upload de l'image et du texte de l'intro de la page d'accueil
	var txtMaxNbChar = 1500;
	var titleMaxNbChar = 50;

	$('.update-col').each(function() {
		var $this = $(this);
		var num = $this.attr('num');
		var cat = $this.attr('cat');
		var $sbmBtn = $this.find('.btn-sbm-img');
		var $croppie;

		var nbRemainingCharArt = txtMaxNbChar - $this.find('.txt').val().length;
		$this.find('.nb-remaining-chars-title').text(nbRemainingCharArt);

		var nbRemainingCharTitle = titleMaxNbChar - $this.find('.title').val().length;
		$this.find('.nb-remaining-chars-txt').text(nbRemainingCharTitle);

		$this.find('.image-file').change(function() {
			$croppie = initCroppie($this.find('.croppie'), $(this), 290, 200);
			$sbmBtn.removeClass('hide');
		});

		$sbmBtn.click(function() {
			saveImg($croppie, 'accueil/' + cat, num);
			$sbmBtn.addClass('hide');
		});

		$this.find('.btn-sbm-txt').click( function() {
			uploadTxt($this.find('.article-title').val(), $this.find('.txt').val(), 'articles', num);
		});

		$this.find('.article-title').on('input', function() {
			nbRemainingCharTitle = titleMaxNbChar - $this.find('.title').val().length;
			$this.find('.nb-remaining-chars-title').text(nbRemainingCharTitle);
			
			if(nbRemainingCharTitle == 0) {
				$this.find('.max-char-nb-title').css('color', 'red');
				return;
			}

			$this.find('.max-char-nb-title').css('color', 'black');
		});

		$this.find('.article-txt').on('input', function() {
			nbRemainingCharArt = txtMaxNbChar - $this.find('.article-txt').val().length;
			$this.find('.nb-remaining-chars-txt').text(nbRemainingCharArt);
		});

	});


});
