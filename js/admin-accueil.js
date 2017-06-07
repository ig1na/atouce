$(document).ready(function() {

	//gestion du menu, fait glisser la page en fonction du menu choisi
	$accueil = $('.accueil');

	$('.link-accueil').on('click', function() {
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

	$('.intro-col').each(function() {
		var $this = $(this);
		var num = $this.attr('num');
		var cat = 'accueil/intro';
		var $sbmBtn = $this.find('.btn-sbm-intro-img');
		var $croppie;

		$this.find('.image-file-intro').on('change', function() {
			$croppie = initCroppie($this.find('.intro-croppie'), $(this), 290, 200);
			$sbmBtn.removeClass('hide');
		});

		$sbmBtn.on('click', function() {
			saveImg($croppie, cat, num);
			$sbmBtn.addClass('hide');
		});

		$this.find('.btn-sbm-intro-txt').on('click', function() {
			uploadTxt($this.find('.intro-title').val(), $this.find('.intro-textarea').val(), 'intro', num);
		});
	});

	$('.article-col').each(function() {
		var $this = $(this);
		var num = $this.attr('num');
		var cat = 'accueil/articles';
		var $sbmBtn = $this.find('.btn-sbm-article-img');
		var $croppie;

		
		var nbRemainingCharArt = txtMaxNbChar - $this.find('.article-txt').val().length;
		
		

		$this.find('.image-file-article').on('change', function() {
			$croppie = initCroppie($this.find('.article-croppie'), $(this), 290, 200);
			$sbmBtn.removeClass('hide');
		});

		$sbmBtn.on('click', function() {
			saveImg($croppie, cat, num);
			$sbmBtn.addClass('hide');
		});

		$this.find('.btn-sbm-article-txt').click( function() {
			uploadTxt($this.find('.article-title').val(), $this.find('.article-txt').val(), 'articles', num);
		});

		$this.find('.article-title').keypress(function() {
			
		});

		$this.find('.article-txt').keypress(function(e) {
			console.log(e.charCode);
			if(e.charCode != 0) {
				nbRemainingCharArt++;
				return;
			}
			//$this.find('')
		});

	});


});
