$(document).ready(function(){

	$('.txt-upload .txt').each(function() {
		var $this = $(this);
		var nbRemainingChars = $this.attr('maxlength') - $this.val().length;
		var $remCharsSpan = $this.next().children('.nb-remaining-chars');

		$remCharsSpan.text(nbRemainingChars);

		if(nbRemainingChars <= 0) {
			$remCharsSpan.css('color', 'red');
			$this.next().css('color', 'red');
		}
	});


	$('#admin-actus').on('click', '#actus-add-btn', function() {
		$.ajax({
			url: '../admin/add-actu.php',
			type: 'POST',
		})
		.done(function() {
			console.log('success');
			//$('.actus').load('index.php .actu-update');
			$('.actus').load('index.php .actus > *');

		})
		.fail(function() {
			console.log('error');
		})
		.always(function() {
			console.log('complete');
		});


	}).on('click', '#btn-del-actu', function() {
		var $this = $(this);
		var num = $this.closest('.actu-update').attr('num');

		$.ajax({
			url: '../admin/delete-news.php',
			type: 'POST',
			data: {
				num: num
			}
		})
		.done(function() {
			console.log("success");
			$('.actus').load('index.php .actus > *');
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});


	}).on('change', 'input[name=checkbox-une]', function() {
		var $this = $(this);
		var num = $this.closest('.actu-update').attr('num');
		var priority = "";

		if($this.is(':checked')) {
			priority = 1;
		} else {
			priority = 0;
		}

		$.ajax({
			url: '../admin/important-news.php',
			type: 'POST',
			data: {
				num: num,
				priority: priority
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


	}).on('click', '.select-menu option', function(){
		$('.actu-update').attr('class', 'actu-update fadeOut');
		
		$('#' + $(this).attr('value')).removeClass('fadeOut');


	}).on('change', '.image-file', function() {
		var $this = $(this);
		var $croppie = initCroppie($this.siblings('.croppie'), $this, 290, 200);

		$this.siblings('.btn-sbm-img').removeClass('hide');


	}).on('click', '.btn-sbm-img', function() {
		var $this = $(this);
		var $croppie = $this.siblings('.croppie');
		var num = $this.closest('.actu-update').attr('num');

		saveImg($croppie, 'news/', num, function() {
			$croppie.attr('class', 'croppie');
			$croppie.load("index.php #actu-update-"+num+" .croppie > img");
		});
		$this.addClass('hide');


	}).on('input', '.txt-upload .txt', function() {
		//gestion de l'affichage du nombre de caracteres restants pour chaque input

		var $this = $(this);
		var $remCharsSpan = $this.next().children('.nb-remaining-chars');
		var nbRemainingChars = $this.attr('maxlength') - $this.val().length;

		$remCharsSpan.text(nbRemainingChars);

		if(nbRemainingChars <= 0) {
			$this.next().css('color', 'red');
			$remCharsSpan.css('color', 'red');
		} else {
			$this.next().css('color', 'black');
			$remCharsSpan.css('color', 'black');
		}


	}).on('click', '.btn-sbm-txt', function() {
		var $this = $(this);
		var $txtUpload = $this.closest('.txt-upload');
		var num = $this.closest('.actu-update').attr('num');
		var title = $txtUpload.find('input[name="title"]').val();
		var text_desc = $txtUpload.find('textarea[name="texte_desc"]').val();
		var text = $txtUpload.find('textarea[name="texte"]').val();

		$.ajax({
			url: '../admin/upload-txt-actus.php',
			type: 'POST',
			data: {
				num: num,
				title: title,
				text_desc: text_desc,
				text: text
			}
		})
		.done(function() {
			console.log("success");
			$('.actus-list').load('index.php .select-menu');
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});

	});




});